<?php


add_action('admin_init', 'tracking_add_sections_and_fields_cb');

function tracking_add_sections_and_fields_cb() {
    add_settings_section(
        'tracking_section_principal',
        'Configurações de registro',
        'tracking_display_section_plug_cb',
        'tracking_dados_registro'
    );

    register_setting(
        'tracking_dados_registro',
        'tracking_dados_registro'
    );

    // Telefone do WhatsApp
    add_settings_field(
        'tracking_phone_whatsapp',
        'Telefone do WhatsApp',
        'tracking_input_phone_whatsapp_cb',
        'tracking_dados_registro',
        'tracking_section_principal'
    );

    // Mensagem WhatsApp
    add_settings_field(
        'tracking_message_whatsapp',
        'Mensagem do WhatsApp',
        'tracking_input_message_whatsapp_cb',
        'tracking_dados_registro',
        'tracking_section_principal'
    );

    // Cor da modal
    add_settings_field(
        'tracking_modal_background',
        'Cor da modal',
        'tracking_input_background_modal_cb',
        'tracking_dados_registro',
        'tracking_section_principal'
    );

    // Transparência da modal
    add_settings_field(
        'tracking_modal_transparent',
        'Transparência da modal',
        'tracking_input_background_modal_transparent_cb',
        'tracking_dados_registro',
        'tracking_section_principal'
    );

    // Cor do tema
    add_settings_field(
        'tracking_theme_color',
        'Cor do tema',
        'tracking_input_theme_color_cb',
        'tracking_dados_registro',
        'tracking_section_principal'
    );

    // Cor das abas ativas
    add_settings_field(
        'tracking_nav_active_color',
        'Cor das abas ativas',
        'tracking_input_nav_active_color_cb',
        'tracking_dados_registro',
        'tracking_section_principal'
    );

    // Chave do GTAG
    add_settings_field(
        'tracking_input_gtag_event',
        'Evento Gtag',
        'tracking_input_gtag_event_cb',
        'tracking_dados_registro',
        'tracking_section_principal'
    );

    // Ativa máscara para telefone
    add_settings_field(
        'tracking_check_mask',
        'Ativar máscara para telefone? (Vanilla Masker)',
        'tracking_mask_phone_cb',
        'tracking_dados_registro',
        'tracking_section_principal'
    );
}