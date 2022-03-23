<?php
/**
 * Cria os campos de formulário e mostra na página de configuração do plugin
 */

function tracking_display_section_plug_cb() 
{
    echo "<h2>Dados de configuração da Tracking</h2>";
}

function tracking_display_section_gtag_cb() 
{
    echo "<h2>Evento GTAG Whatsapp</h2>";
}

// Telefone do WhatsApp
function tracking_input_phone_whatsapp_cb()
{
    $configuracoes  = get_option('tracking_dados_registro');
    $tracking_value = isset( $configuracoes['tracking_phone_whatsapp'] ) ? $configuracoes['tracking_phone_whatsapp'] : '';
    $field          = '<input type="text" name="tracking_dados_registro[tracking_phone_whatsapp]" value="'.$tracking_value.'">';
    
    echo $field;
}

// Mensagem do WhatsApp
function tracking_input_message_whatsapp_cb()
{
    $configuracoes  = get_option('tracking_dados_registro');
    $tracking_value = isset( $configuracoes['tracking_message_whatsapp'] ) ? $configuracoes['tracking_message_whatsapp'] : '';
    $field          = '<input type="text" name="tracking_dados_registro[tracking_message_whatsapp]" value="'.$tracking_value.'">';
    
    echo $field;
}

// Cor da modal
function tracking_input_background_modal_cb() 
{
    $configuracoes        = get_option('tracking_dados_registro');
    $tracking_backgroundModal = isset( $configuracoes['tracking_background_modal'] ) ? $configuracoes['tracking_background_modal'] : '#000000';
    $colorPicker          = '<input type="color" name="tracking_dados_registro[tracking_background_modal]" value="'.$tracking_backgroundModal.'">';
    
    echo $colorPicker;
}

// Transparência da modal
function tracking_input_background_modal_transparent_cb() 
{
    $configuracoes         = get_option('tracking_dados_registro');
    $tracking_modalTransparent = isset( $configuracoes['tracking_modal_transparent'] ) ? $configuracoes['tracking_modal_transparent'] : '1';
    $inputRanger           = '<input type="range" name="tracking_dados_registro[tracking_modal_transparent]" class="regular-text" value="'.esc_html($tracking_modalTransparent).'" min="0" max="1" step="0.01" oninput="display.value=value" onchange="display.value=value"> <input type="text" id="display" value="'.esc_html($tracking_modalTransparent).'" readonly style="width: 50px;">';

    echo $inputRanger;
}

// Cor do tema
function tracking_input_theme_color_cb()
{
    $configuracoes            = get_option('tracking_dados_registro');
    $tracking_backgroundContainer = isset( $configuracoes['tracking_theme_color'] ) ? $configuracoes['tracking_theme_color'] : '#0000FF';
    $colorPicker              = '<input type="color" name="tracking_dados_registro[tracking_theme_color]" value="'.$tracking_backgroundContainer.'">';
    
    echo $colorPicker;
}

// Cor das abas ativas
function tracking_input_nav_active_color_cb()
{
    $configuracoes      = get_option('tracking_dados_registro');
    $tracking_fontColor = isset( $configuracoes['tracking_nav_active_color'] ) ? $configuracoes['tracking_nav_active_color'] : '#FFFFFF';
    $colorPicker        = '<input type="color" name="tracking_dados_registro[tracking_nav_active_color]" value="'.$tracking_fontColor.'">';
    
    echo $colorPicker;
}

// Chave do GTAG
function tracking_input_gtag_event_cb()
{
    $configuracoes      = get_option('tracking_dados_registro');
    $tracking_gtagValue = isset( $configuracoes['tracking_input_gtag_event'] ) ? $configuracoes['tracking_input_gtag_event'] : '';
    $field              = '<input type="text" name="tracking_dados_registro[tracking_input_gtag_event]" value="'.$tracking_gtagValue.'">';
    
    echo $field;
}

// Máscara para telefone
function tracking_mask_phone_cb()
{
    $configuracoes  = get_option('tracking_dados_registro');
    $tracking_value = $configuracoes['tracking_check_mask'] ? ' checked' : '';

    $field          = '<input type="checkbox" name="tracking_dados_registro[tracking_check_mask]" value="1"'.$tracking_value.'>';
    
    echo $field;
}