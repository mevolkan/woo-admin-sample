<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function send_data_to_api($user_id)
{
    $api_key = get_user_meta($user_id, 'wc_sample_my_account_tab_api_key', true);
    $options = get_user_meta($user_id, 'wc_sample_my_account_tab_options_' . $user_id, true);
    $url = 'https://httpbin.org/post';

    $data = array(
        'options' => $options,
    );

    $headers = array(
        'Authorization' => 'Bearer ' . $api_key,
    );

    $request_args = array(
        'body'    => $data,
        'headers' => $headers,
    );
    $response = wp_remote_post($url, $request_args);

    if (!is_wp_error($response)) {
        $response_body = wp_remote_retrieve_body($response);
        set_transient('woo_account_' . $user_id, $response_body, 3600); // Store for 1 hour (adjust the duration as needed)
    }
}

function store_api_data_as_transient()
{
    // Code to store data as transients
}
