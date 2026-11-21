<?php

return [
    'text_title' => 'Pagos',
    'text_side_menu' => 'Pasarelas de pago',
    'text_form_name' => 'Pago',
    'text_tab_config' => 'Configuración',
    'text_filter_search' => 'Buscar por nombre o descripción.',
    'text_empty' => 'No hay pagos disponibles.',
    'text_this_payment' => 'este método de pago',
    'text_save_card_profile' => 'Guardar datos de la tarjeta para después.',
    'text_refund_title' => 'Reembolso: %s',
    'text_refund_full' => 'Reembolso total',
    'text_refund_partial' => 'Reembolso parcial',
    'text_payment_logs' => 'Intentos de pago',
    'text_permission_group' => 'Pago',

    'label_payments' => 'Pasarelas de pago',
    'label_code' => 'Código único',
    'label_default' => 'Es predeterminado',
    'label_priority' => 'Prioridad',
    'label_order_fee_type' => 'Tipo de cargo adicional',
    'label_order_fee' => 'Cargo adicional',
    'label_order_total' => 'Monto total mínimo de pedido',
    'label_order_status' => 'Estado de pedido',
    'label_capture_status' => 'Estado de pedido para capturar pago',
    'label_refund_type' => 'Tipo de reembolso',
    'label_refund_amount' => 'Monto de reembolso parcial',
    'label_refund_reason' => 'Motivo del reembolso',

    'onboarding_payments' => 'Configura cómo te pagan',
    'help_onboarding_payments' => 'Habilita y configura al menos un método de pago para que puedas empezar a aceptar pedidos de inmediato — en línea o fuera de línea.',

    'button_delete_card' => 'Eliminar y usar una tarjeta diferente.',
    'button_refund' => 'Reembolsar',

    'alert_min_total' => 'El total del pedido está por debajo del mínimo requerido para %s.',
    'alert_min_order_total' => 'Necesitas gastar %s o más para pagar con %s.',
    'alert_order_fee' => 'Hay un cargo adicional de %s cuando pagas con %s.',
    'alert_missing_applicable_fee' => 'Falta el cargo adicional para el pago de %s.',
    'alert_set_default' => 'Pago establecido como predeterminado',
    'alert_setting_missing_id' => 'No se ha especificado el código de configuración de la extensión.',
    'alert_invalid_code' => 'Código de pasarela de pago seleccionado no válido.',
    'alert_code_not_found' => 'No se pudo encontrar la pasarela de pago con código %s',
    'alert_refund_success' => 'Pago reembolsado con éxito',

    'help_order_total' => 'El monto total que debe alcanzar el pedido antes de que esta pasarela de pago esté activa',
    'help_order_fee' => 'Cargo adicional al total del pedido cuando esta pasarela de pago está activa',
    'help_order_status' => 'Estado de pedido por defecto cuando se usa este método de pago. Deja en blanco para usar el estado de pedido por defecto establecido en los ajustes de pedidos (Gestionar > Configuración > Pedido).',
    'help_capture_status' => 'El estado de pedido que captura un pago autorizado.',

    'help_permission' => 'Administrar pasarelas de pago',
    'help_payments' => 'Selecciona los pagos disponibles en esta ubicación. Deja en blanco para usar todos los pagos habilitados',
    'help_no_payments' => 'No se encontró ningún pago habilitado.',

    'cod' => [
        'text_tab_general' => 'General',
        'text_payment_title' => 'Pago contra entrega',
        'text_payment_desc' => 'Paga en efectivo cuando recojas tu pedido o cuando sea entregado',

        'label_title' => 'Título',
        'label_status' => 'Estado',
        'label_priority' => 'Prioridad',
    ],

    'paypal' => [
        'text_tab_general' => 'General',
        'text_payment_title' => 'PayPal Express',
        'text_payment_desc' => 'Paga de forma segura usando tu cuenta de PayPal',

        'text_sandbox' => 'Pruebas (Sandbox)',
        'text_go_live' => 'Pasar a producción',
        'text_sale' => 'VENTA',
        'text_authorization' => 'AUTORIZACIÓN',

        'label_title' => 'Título',
        'label_api_user' => 'ID de cliente',
        'label_api_pass' => 'Secreto del cliente',
        'label_api_sandbox_user' => 'ID de cliente (pruebas)',
        'label_api_sandbox_pass' => 'Secreto del cliente (pruebas)',
        'label_api_mode' => 'Modo',
        'label_api_action' => 'Acción de pago',
        'label_priority' => 'Prioridad',
        'label_status' => 'Estado',

        'alert_error_server' => '<p class="alert-danger">Lo sentimos, ocurrió un error, por favor inténtalo de nuevo</p>',
    ],

    'authorize_net_aim' => [
        'text_payment_title' => 'Authorize.Net (AIM)',
        'text_payment_desc' => 'Paga con tu tarjeta de crédito a través de Authorize.Net',
        'text_go_live' => 'Pasar a producción',
        'text_test' => 'Pruebas',
        'text_test_live' => 'Pruebas en producción',
        'text_sale' => 'VENTA',
        'text_auth_only' => 'Solo autorización',
        'text_auth_capture' => 'Autorización y captura',
        'text_visa' => 'Visa',
        'text_mastercard' => 'MasterCard',
        'text_american_express' => 'American Express',
        'text_jcb' => 'JCB',
        'text_diners_club' => 'Diners Club',

        'label_title' => 'Título',
        'label_api_login_id' => 'ID de inicio de sesión de API',
        'label_client_key' => 'Clave del cliente',
        'label_transaction_key' => 'Clave de transacción',
        'label_transaction_mode' => 'Modo de transacción',
        'label_transaction_type' => 'Tipo de transacción',
        'label_priority' => 'Prioridad',
        'label_status' => 'Estado',

        'alert_acceptable_cards' => 'Solo aceptamos %s',
    ],

    'stripe' => [
        'text_tab_general' => 'General',
        'text_payment_title' => 'Pago con Stripe',
        'text_payment_desc' => 'Paga con tu tarjeta de crédito usando Stripe',
        'text_credit_or_debit' => 'Tarjeta de crédito o débito',

        'text_auth_only' => 'Solo autorización',
        'text_auth_capture' => 'Autorización y captura',
        'text_description' => 'Pago con tarjeta de crédito usando Stripe',
        'text_live' => 'Producción',
        'text_test' => 'Pruebas',
        'text_stripe_charge_description' => '%s Cargo por %s',
        'text_payment_status' => 'Pago %s (%s)',

        'label_title' => 'Título',
        'label_description' => 'Descripción',
        'label_transaction_mode' => 'Modo de transacción',
        'label_transaction_type' => 'Tipo de transacción',
        'label_test_secret_key' => 'Clave secreta de pruebas',
        'label_test_publishable_key' => 'Clave pública de pruebas',
        'label_live_secret_key' => 'Clave secreta de producción',
        'label_live_publishable_key' => 'Clave pública de producción',
        'label_test_webhook_secret' => 'Secreto de webhook de pruebas',
        'label_live_webhook_secret' => 'Secreto de webhook de producción',
        'label_locale_code' => 'Código de idioma',
        'label_priority' => 'Prioridad',
        'label_status' => 'Estado',
        'label_offsite_enabled' => 'Modo externo (Stripe Checkout)',
        'help_offsite_enabled' => 'Al habilitar el modo externo, los clientes serán redirigidos a una página de pago alojada por Stripe para completar el pago.',

        'help_locale_code' => 'Consulta los <a href="https://stripe.com/docs/js/appendix/supported_locales">idiomas soportados por Stripe.js</a',
    ],

    'mollie' => [
        'text_payment_title' => 'Pago con Mollie',
        'text_payment_desc' => 'Paga con tu tarjeta de crédito a través de Mollie',

        'text_live' => 'Producción',
        'text_test' => 'Pruebas',
        'text_description' => 'Pago con tarjeta de crédito usando Mollie',
        'text_payment_status' => 'Pago %s (%s)',

        'label_transaction_mode' => 'Modo de transacción',
        'label_test_api_key' => 'Clave API de pruebas',
        'label_live_api_key' => 'Clave API de producción',
    ],

    'square' => [
        'text_payment_title' => 'Pago con Square',
        'text_payment_desc' => 'Paga con tu tarjeta de crédito usando Square',

        'text_description' => 'Pago con tarjeta de crédito usando Square',
        'text_live' => 'Producción',
        'text_test' => 'Pruebas',
        'text_payment_status' => 'Pago %s (%s)',

        'label_title' => 'Título',
        'label_description' => 'Descripción',
        'label_transaction_mode' => 'Modo de transacción',
        'label_test_app_id' => 'ID de aplicación de pruebas',
        'label_test_access_token' => 'Token de acceso de pruebas',
        'label_test_location_id' => 'ID de ubicación de pruebas',
        'label_live_app_id' => 'ID de aplicación de producción',
        'label_live_access_token' => 'Token de acceso de producción',
        'label_live_location_id' => 'ID de ubicación de producción',

        'help_square' => 'Obtén las claves API de Square <a href="https://developer.squareup.com">aquí</a>',
    ],
];
