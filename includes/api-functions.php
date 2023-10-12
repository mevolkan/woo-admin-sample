<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

require_once("warnings.php");
$userId = get_current_user_id();

function send_data_to_api($userId)
{
    $apiKey = sanitize_text_field(get_user_meta($userId, 'wc_sample_my_account_tab_api_key', true));
    $options = sanitize_textarea_field(get_user_meta($userId, 'wc_sample_my_account_tab_options_' . $userId, true));

    if (empty($apiKey) && current_user_can('administrator')) {
        new AdminWarnings('Api Key is not set');
    } elseif (empty($apiKey)) {
        new AdminWarnings('Api Key is not set contact the website admin');
    }
    if (empty($options)) {
        new AdminWarnings('Please add atleast one option');
    }



    $url = 'https://httpbin.org/post';
    $data = array(
        'options' => $options,
    );

    $headers = array(
        'Authorization' => 'Bearer ' . $apiKey,
    );

    $requestArgs = array(
        'body'    => $data,
        'headers' => $headers,
    );
    $response = wp_remote_post($url, $requestArgs);


    if (!is_wp_error($response)) {
        $responseBody = wp_remote_retrieve_headers($response);
       
        set_transient('woo_account_' . $userId, $responseBody, 10800); // Store for 3 hours (adjust the duration as needed)
        return $responseBody;
    }
    return $response;
}

function fetch_data_from_transients($userId)
{
    $transientData = get_transient('woo_account_' . $userId);

    if (false !== $transientData) {
        return $transientData;
    }
    send_data_to_api($userId);

    return $transientData;
}
