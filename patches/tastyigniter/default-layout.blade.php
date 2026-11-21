---
description: Default layout
---
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ App::getLocale() }}" class="h-100">
<head>
    @include('igniter-orange::includes.head')
    @livewireStyles
</head>
<body class="d-flex flex-column h-100 {{ $this->page->bodyClass }}">

<header class="header">
    @include('igniter-orange::includes.header')
</header>

<main role="main">
    <div id="page-wrapper">
        @themePage
    </div>
</main>

@unless($this->page->hideFooter)
<footer class="footer mt-auto">
    @include('igniter-orange::includes.footer')
</footer>
@endunless
<livewire:igniter-orange::utils.modal/>
<livewire:igniter-orange::utils.flash-message/>
@include('igniter-orange::includes.eucookiebanner')
{{--
    Menu QR fix (2026-11-19 / repatched 2026-11-21): el tema de TastyIgniter
    (ti-theme-orange) nunca carga jQuery por su cuenta, pero su propio JS
    combinado (@themeScripts -> fulfillment.js, star-rating, orange-modal,
    etc.) está escrito como `+function ($) { ... }(window.jQuery)` y además
    Alpine/Livewire evalúan `x-data="OrangeFulfillment(...)"` apenas carga la
    página. Sin jQuery, ese bloque truena en la primera línea
    (`$.ti === undefined` -> TypeError, window.jQuery es undefined) y como
    resultado NINGUNA de las funciones que se definen después en ese mismo
    archivo (OrangeFulfillment, OrangeCartItem, etc.) llega a registrarse,
    lo que rompe todo el checkout/fulfillment (selector de fecha/hora,
    dirección de entrega, opciones del carrito) con errores en consola como
    "OrangeFulfillment is not defined", "$ is not defined", etc.
    Se agrega jQuery por CDN ANTES de @livewireScripts / includes.scripts
    para que esté disponible cuando el bundle del tema se ejecuta.

    Segunda vuelta (mismo día): con jQuery ya cargado, el bundle seguía
    truncándose un poco más abajo, en el widget de "star rating"
    (ti-ext-local), que llama a `$(document).render(fn)` — un plugin de
    jQuery de una versión vieja de October/Winter CMS que este tema ya no
    trae instalado en ningún paquete de vendor/ (TastyIgniter v4 se movió a
    Livewire). Sin ese plugin, `$(...).render is not a function` tronaba
    igual de temprano en el archivo y volvía a tapar todo lo que viene
    después (OrangeFulfillment, etc.). Se agrega un polyfill mínimo e
    inofensivo: si `$.fn.render` no existe, se define como un alias de
    `$(document).ready(fn)` (que es, en la práctica, lo único que ese
    widget necesita).
--}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    (function ($) {
        if ($ && $.fn && typeof $.fn.render !== 'function') {
            $.fn.render = function (callback) {
                return $(document).ready(callback);
            };
        }
    })(window.jQuery);
</script>
@livewireScripts
@include('igniter-orange::includes.scripts')
</body>
</html>
