<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$userId = get_current_user_id();


function woo_admin_sample_add_dashboard_widgets()
{
    wp_add_dashboard_widget(
        'woo_admin_sample_dashboard_widget',                          // Widget slug.
        esc_html__('User Account Details', 'woo_admin_sample'), // Title.
        'woo_admin_sample_dashboard_widget_render'                    // Display function.
    );
}
add_action('wp_dashboard_setup', 'woo_admin_sample_add_dashboard_widgets');

function woo_admin_sample_dashboard_widget_render($userId)
{
    $apiData =  fetch_data_from_transients($userId);
   //$apiData = send_data_to_api($userId);
    esc_html_e(print_r($apiData), "woo_admin_sample");
}
