<?php

add_action('wp_head', 'tracking_add_style');
function tracking_add_style()
{
    $dir_plugin = WP_PLUGIN_URL . '/' . PL_TRACKING_PASTA;

    $style = "<link rel='stylesheet' id='tracking-plugin-css'  href='".$dir_plugin."/css/tracking.css' type='text/css' media='all' />";

    echo $style;
}