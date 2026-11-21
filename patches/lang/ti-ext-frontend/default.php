<?php

return [

    'text_side_menu' => 'Carruseles y Banners',

    'banners' => [
        'text_tab_general' => 'General',
        'text_edit_banner' => 'Editar Banner',
        'text_title' => 'Banners',
        'text_form_name' => 'Banner',
        'text_filter_search' => 'Buscar por nombre, tipo o estado.',
        'text_empty' => 'No hay banners disponibles.',
        'text_image' => 'Imagen',
        'text_custom' => 'Personalizado',

        'column_banner' => 'Banner',
        'column_dimension' => 'Dimensión (Ancho x Alto)',
        'column_layout_partial' => 'Diseño - Área parcial',
        'column_status' => 'Estado',
        'column_id' => 'ID',

        'label_banner' => 'Banner',
        'label_dimension' => 'Dimensión (Ancho x Alto)',
        'label_width' => 'Ancho',
        'label_height' => 'Alto',
        'label_status' => 'Estado',
        'label_layout_partial' => 'Diseño - Área parcial',
        'label_type' => 'Tipo',
        'label_click_url' => 'URL al hacer clic',
        'label_language' => 'Idioma',
        'label_alt_text' => 'Texto alternativo',
        'label_image' => 'Imagen',
        'label_custom_code' => 'Código personalizado',

        'button_banners' => 'Añadir nuevo banner',

        'help_layouts' => 'Elige un diseño para añadir uno o más banners.',
        'help_image' => 'Elige varias imágenes para mostrar el banner como carrusel',
        'help_click_url' => 'Puedes usar una URL relativa o absoluta del sitio',

        'alert_set_banners' => 'Primero debes añadir el módulo de banners a uno o más diseños',
    ],

    'slider' => [
        'text_title' => 'Carruseles',
        'text_tab_general' => 'General',
        'text_form_name' => 'Carrusel',
        'text_empty' => 'No hay carruseles disponibles.',

        'text_tab_slides' => 'Diapositivas',

        'column_updated_at' => 'Actualizado',

        'label_code' => 'El código único del carrusel a mostrar.',
        'label_slider' => 'Código del carrusel',
        'label_effect' => 'El efecto a usar al hacer la transición entre diapositivas.',
        'label_interval' => 'El intervalo de retraso entre diapositivas en milisegundos.',
        'label_caption' => 'Subtítulo',
        'label_images' => 'Imágenes',
        'label_hide_controls' => 'Ocultar los controles del carrusel.',
        'label_hide_indicators' => 'Ocultar los indicadores del carrusel.',
        'label_hide_captions' => 'Ocultar los subtítulos del carrusel.',
    ],

    'featured' => [
        'text_tab_general' => 'General',
        'text_featured_menus' => 'Menú destacado',

        'column_menu_name' => 'Nombre del menú',
        'column_menu_remove' => 'Quitar',

        'label_title' => 'Título',
        'label_menus' => 'Menús',
        'label_limit' => 'Límite',
        'label_items_per_row' => 'Productos por fila',
        'label_dimension' => 'Dimensión:',
        'label_dimension_w' => 'Ancho de dimensión',
        'label_dimension_h' => 'Alto de dimensión',

        'help_dimension' => '(Ancho x Alto)',
        'help_items_per_row' => 'El número de productos a mostrar por fila',
    ],

    'captcha' => [
        'label_api_site_key' => 'Clave del sitio',
        'label_api_secret_key' => 'Clave secreta',
        'label_version' => 'Versión',
        'label_version_v2' => 'reCAPTCHA v2',
        'label_version_invisible' => 'reCAPTCHA v2 Invisible',
        'label_version_v3' => 'reCAPTCHA v3',
        'label_lang' => 'Idioma',

        'error_recaptcha' => '¡Por favor confirma que eres humano!',

        'help_lang' => 'Fuerza al widget a mostrarse en un idioma específico. Automático - detecta el idioma del usuario si no se especifica.',
    ],
];
