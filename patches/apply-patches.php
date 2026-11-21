<?php
/**
 * Re-aplica los fixes de Menu QR sobre archivos de vendor/ después de
 * cada `composer install` / `composer update`.
 *
 * ¿Por qué existe esto?
 * ---------------------
 * vendor/ y composer.lock están en .gitignore (ver .gitignore del repo),
 * así que en cada build de Docker (ver repo/Dockerfile) Composer vuelve a
 * descargar desde cero los paquetes tastyigniter/ti-ext-reservation y
 * tastyigniter/ti-ext-cart tal cual los publica el autor original — sin
 * nuestros fixes. Este script copia nuestras versiones corregidas encima,
 * automáticamente, en cada build/redeploy, para que el arreglo no se
 * pierda nunca más.
 *
 * Qué corrige cada archivo (ver también /patches/README.md):
 *  - ReservationScope.php y OrderScope.php: las consultas usaban
 *    funciones de MySQL (ADDTIME, DATE_SUB, DATE_ADD) que no existen en
 *    PostgreSQL, rompiendo la búsqueda de disponibilidad de mesas/pedidos.
 *  - BookingManager.php: si el envío del correo de confirmación fallaba
 *    (p. ej. por no tener SMTP configurado), TODA la reserva se
 *    cancelaba/revertía aunque la mesa sí estuviera disponible. Ahora un
 *    fallo de notificación solo queda registrado en el log, sin anular
 *    la reserva.
 */

$root = dirname(__DIR__); // raíz del proyecto (un nivel arriba de /patches)

$map = [
    __DIR__.'/tastyigniter/ReservationScope.php' =>
        $root.'/vendor/tastyigniter/ti-ext-reservation/src/Models/Scopes/ReservationScope.php',

    __DIR__.'/tastyigniter/OrderScope.php' =>
        $root.'/vendor/tastyigniter/ti-ext-cart/src/Models/Scopes/OrderScope.php',

    __DIR__.'/tastyigniter/BookingManager.php' =>
        $root.'/vendor/tastyigniter/ti-ext-reservation/src/Classes/BookingManager.php',

    // El tema (ti-theme-orange) nunca carga jQuery por su cuenta, pero su
    // propio JS combinado (@themeScripts) está escrito asumiendo que
    // window.jQuery existe. Sin esto, TODO el checkout/fulfillment se rompe
    // (selector de fecha/hora, dirección de entrega, opciones del carrito)
    // con "OrangeFulfillment is not defined", "$ is not defined", etc. Ver
    // el comentario dentro de default-layout.blade.php para el detalle.
    __DIR__.'/tastyigniter/default-layout.blade.php' =>
        $root.'/vendor/tastyigniter/ti-theme-orange/resources/views/_layouts/default.blade.php',
];

// Traducción al español (es_ES). Estos archivos NO sobrescriben un archivo
// existente de un paquete: agregan un locale nuevo que Laravel/TastyIgniter
// no trae de fábrica, así que a diferencia del $map de arriba, sí hace falta
// crear las carpetas de destino si todavía no existen (is_file() no aplica
// como filtro de "paquete no instalado": simplemente puede que sea la
// primera vez que se corre esto en una imagen nueva).
$langMap = [
    __DIR__.'/lang/core/admin.php' => $root.'/lang/vendor/igniter/es_ES/admin.php',
    __DIR__.'/lang/core/main.php' => $root.'/lang/vendor/igniter/es_ES/main.php',
    __DIR__.'/lang/core/system.php' => $root.'/lang/vendor/igniter/es_ES/system.php',

    __DIR__.'/lang/ti-ext-reservation/default.php' =>
        $root.'/vendor/tastyigniter/ti-ext-reservation/resources/lang/es_ES/default.php',
    __DIR__.'/lang/ti-ext-cart/default.php' =>
        $root.'/vendor/tastyigniter/ti-ext-cart/resources/lang/es_ES/default.php',
    __DIR__.'/lang/ti-ext-frontend/default.php' =>
        $root.'/vendor/tastyigniter/ti-ext-frontend/resources/lang/es_ES/default.php',
    __DIR__.'/lang/ti-ext-local/default.php' =>
        $root.'/vendor/tastyigniter/ti-ext-local/resources/lang/es_ES/default.php',
    __DIR__.'/lang/ti-ext-pages/default.php' =>
        $root.'/vendor/tastyigniter/ti-ext-pages/resources/lang/es_ES/default.php',
    __DIR__.'/lang/ti-ext-payregister/default.php' =>
        $root.'/vendor/tastyigniter/ti-ext-payregister/resources/lang/es_ES/default.php',
    __DIR__.'/lang/ti-ext-coupons/default.php' =>
        $root.'/vendor/tastyigniter/ti-ext-coupons/resources/lang/es_ES/default.php',
    __DIR__.'/lang/ti-theme-orange/default.php' =>
        $root.'/vendor/tastyigniter/ti-theme-orange/resources/lang/es_ES/default.php',
];

$ok = true;

foreach ($map as $source => $target) {
    if (!is_file($target)) {
        // El paquete todavía no está instalado (p. ej. primera etapa del
        // Dockerfile con --no-autoloader) o cambió de ubicación. No es un
        // error fatal: seguimos con los demás archivos.
        fwrite(STDERR, "[menuqr-patches] AVISO: no existe destino, se omite: $target\n");
        continue;
    }

    if (!copy($source, $target)) {
        fwrite(STDERR, "[menuqr-patches] ERROR copiando $source -> $target\n");
        $ok = false;
        continue;
    }

    echo "[menuqr-patches] OK: ".basename($target)." actualizado\n";
}

foreach ($langMap as $source => $target) {
    $dir = dirname($target);
    if (!is_dir($dir) && !mkdir($dir, 0755, true) && !is_dir($dir)) {
        fwrite(STDERR, "[menuqr-patches] ERROR creando carpeta $dir\n");
        $ok = false;
        continue;
    }

    if (!copy($source, $target)) {
        fwrite(STDERR, "[menuqr-patches] ERROR copiando $source -> $target\n");
        $ok = false;
        continue;
    }

    echo "[menuqr-patches] OK: idioma es_ES -> ".basename(dirname($target, 1))."/".basename($target)." actualizado\n";
}

exit($ok ? 0 : 1);
