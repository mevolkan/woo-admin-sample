<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$userId = get_current_user_id();


function woo_admin_sample_add_dashboard_widgets()
{
    wp_add_dashboard_widget(
        'woo_admin_sample_dashboard_widget',
        __('User Account Details', 'woo_admin_sample'),
        'woo_admin_sample_dashboard_widget_render'
    );
}
add_action('wp_dashboard_setup', 'woo_admin_sample_add_dashboard_widgets');

function woo_admin_sample_dashboard_widget_render()
{
    $userId = get_current_user_id();
    $apiHeaderData = fetch_data_from_transients($userId);

    $output = '';

    foreach ($apiHeaderData as $key => $value) {
        $output .= esc_html($key) . ' ' . esc_html($value) . '<br>';
    }

    echo $output;
}

