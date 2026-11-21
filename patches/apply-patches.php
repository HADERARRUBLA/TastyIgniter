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

exit($ok ? 0 : 1);
