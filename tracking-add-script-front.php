<?php
/**
 * Adiciona arquivo JS no footer da página
 */

add_action('wp_footer', 'tracking_add_html_script');
function tracking_add_html_script()
{
    // Adiciona HTML no frontend
    require_once('tracking-html.php');

    $configuracoes  = get_option('tracking_dados_registro');
    if($configuracoes['tracking_check_mask']) {

        echo "<script type='text/javascript' src='https://cdn.jsdelivr.net/gh/lagden/vanilla-masker@lagden/build/vanilla-masker.min.js' id='vanilla-masker-js'></script>";

    }

    $dir_plugin = WP_PLUGIN_URL . '/' . PL_TRACKING_PASTA;
    $script = '<script type="text/javascript" src="'.$dir_plugin.'/js/tracking.js" id="tracking-js"></script>';

    echo $script;
}