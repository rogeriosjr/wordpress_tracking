<?php
/**
 * Plugin Name: Tracking
 * Plugin URI: https://www.3xceler.com.br/criacao-de-sites
 * Description: Plugin que cria opções de contatos (whatsapp, telefone e formulário de contato) flutuantes nas páginas.
 * Author: Rogério Rios Júnior
 * Version: 1.0
 * Licence: GPL2+
 */

// Define constante de versão requerida
define('REQUIRE_VERSION', '4.0.0');
//define('PL_TRACKING_PASTA', 'plugin-tracking-wordpress-3xceler');
define('PL_TRACKING_PASTA', 'tracking');

// Função chamada pelo wp no momento de ativação (caminho, função_de_callback)
register_activation_hook(__FILE__, function() {
    // Importando a variável global de versão do wp
    global $wp_version, $wpdb;
    // Chamando a função que cgompara as versões
    if(version_compare($wp_version, REQUIRE_VERSION, '<'))
    {
        wp_die('É necessário a versão ' . REQUIRE_VERSION . ' ou superior');
    }

});

// Função chamada no momento de desativação do plugin
register_deactivation_hook(__FILE__, function() {
    global $wpdb;
    
    $file       = fopen(WP_PLUGIN_DIR . '/tracking_inaticve_log.txt', 'a');
    $linha      = 'O plugin foi desativado com sucesso!\nData da desativação: ' . date("d/m/Y H:m:i");
    fwrite($file, $linha);
    fclose($file);
});
/**
 * FUNÇÃO DE DESINSTALAÇÃO DE UM PLUGIN
 * Realiza funções no momento de desinstalação do plugin
 */
register_uninstall_hook(__FILE__, 'tracking_uninstall_plugin');
function tracking_uninstall_plugin()  {
    $file  = fopen(WP_PLUGIN_DIR . '/tracking_unistall_log.txt', 'a');
    $linha = 'O plugin foi desinstalado com sucesso!\nData da desinstalação: ' . date("d/m/Y H:m:i");
    fwrite($file, $linha);
    fclose($file);
}

require_once('functions.php');

// Função que adiciona menu e submenu no admin do WP
add_action('admin_menu', function() {
    // Adicionando submenu em configurações
    add_options_page(
        'Configurações de Tracking',
        'Configurações de Tracking',
        'manage_options',
        'tracking_slug_config',
        'tracking_slug_config_cb'

    );
});


// Ação realizada antes de salvar os dados no banco de dados
add_action( 'updated_option', function() {

	// Busca dados no BD
    $dadosModal 		= $_POST['tracking_dados_registro'];
    
    // Configuração do arquivo CSS
    $backgroundModal 	= trackingHex2RGBA($dadosModal['tracking_background_modal'], $dadosModal['tracking_modal_transparent']);
    $themeColor			= $dadosModal['tracking_theme_color'];
    $navActive 			= $dadosModal['tracking_nav_active_color'];


    if(isset($_POST['tracking_dados_registro'])) {
        
        $file_model     = WP_PLUGIN_DIR . '/'.PL_TRACKING_PASTA.'/tracking_css.txt'; 
        $handle_model   = fopen($file_model, 'r');
        
        $file           = WP_PLUGIN_DIR . '/'.PL_TRACKING_PASTA.'/css/tracking.css';
        $handle_file    = fopen($file, 'w');
        
        if($handle_model) {

            $contents       = fread($handle_model, filesize($file_model));
            $array_str      = ['{{BACKGROUND_MODAL}}','{{THEME_COLOR}}', '{{NAV_ACTIVE}}'];
            
            $array_replace  = [$backgroundModal, $themeColor, $navActive];
            $contents       = str_replace($array_str, $array_replace, $contents);
        
            fwrite($handle_file, $contents);
            
            fclose($handle_model);
            fclose($handle_file);

        }

        // Configuração do arquivo JS
        $gtag_js = $dadosModal['tracking_input_gtag_event'];
        $maskPhone = "
const trackingPhoneMask = ['(99) 9999-99999', '(99) 99999-9999'];
const trackingPhones    = document.querySelectorAll('.phone-mask');
const inputHandler      = (masks, max, event) => {
    const c = event.target;
    const v = c.value.replace(/\D/g, '');
    const m = c.value.length > max ? 1 : 0;
    VMasker(c).unMask();
    VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
}
if (trackingPhones) {
    trackingPhones.forEach(tel => {
        VMasker(tel).maskPattern(trackingPhoneMask[0]);
        tel.addEventListener('input', inputHandler.bind(undefined, trackingPhoneMask, 14), false);
    });
}";
        $activeMaskPhone = ($dadosModal['tracking_check_mask']) ? $maskPhone : '';


        $file_model_js   = WP_PLUGIN_DIR . '/'.PL_TRACKING_PASTA.'/tracking_js.txt'; 
        $handle_model_js = fopen($file_model_js, 'r');

        $file_js         = WP_PLUGIN_DIR . '/'.PL_TRACKING_PASTA.'/js/tracking.js';
        $handle_file_js  = fopen($file_js, 'w');

        if($handle_model_js) {

            $array_str_js      = ['{{GTAG_EVENT}}','{{MASK_PHONE}}'];
            $array_replace_js  = [$gtag_js, $activeMaskPhone];

        	$contents_js    = fread($handle_model_js, filesize($file_model_js));
        	$contents_js    = str_replace($array_str_js, $array_replace_js, $contents_js);

        	fwrite($handle_file_js, $contents_js);
            
            fclose($handle_model_js);
            fclose($handle_file_js);

        }
    }
});

function tracking_slug_config_cb()
{
    require_once('config-form.php');
}

// Inclui arquivo que cria os campos do formulário
require_once('tracking-add-form.php');

// Mostra campos do formulário
require_once('tracking-display-form.php');

// Adiciona estilo CSS ao cabeçalho da página no frontend
require_once('tracking-add-style-front.php');

// Adiciona script JS no frontend
require_once('tracking-add-script-front.php');