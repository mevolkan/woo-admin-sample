<?php
add_filter('woocommerce_settings_tabs_array', 'sample_my_acount_add_settings_tab', 50);
function sample_my_acount_add_settings_tab($settings_tabs)
{
    $settings_tabs['sample_my_account_tab'] = __('My Account', 'sample-my-account');
    return $settings_tabs;
}

add_action('woocommerce_settings_tabs_sample_my_account_tab', 'sample_my_account_tab');
function sample_my_account_tab()
{
    woocommerce_admin_fields(sample_my_account_get_settings());
}

function sample_my_account_get_settings()
{
    if (is_user_logged_in()) {
        $current_user_id = get_current_user_id();
        if (current_user_can('administrator')) {
            $settings = array(
                'section_title' => array(
                    'name'     => __('My Account Settings', 'sample-my-account'),
                    'type'     => 'title',
                    'desc'     => '',
                    'id'       => 'wc_sample_my_account_tab_section_title'
                ),
                'api_key' => array(
                    'name' => __('Api Key', 'sample-my-account'),
                    'type' => 'text',
                    'desc' => __('Add API key', 'sample-my-account'),
                    'id'   => 'wc_sample_my_account_tab_api_key'
                ),
                'options' => array(
                    'name' => __('Options', 'sample-my-account'),
                    'type' => 'textarea',
                    'desc' => __('Add options separated by a comma.', 'sample-my-account'),
                    'id'   => 'wc_sample_my_account_tab_options'
                ),
                'section_end' => array(
                    'type' => 'sectionend',
                    'id' => 'wc_sample_my_account_tab_section_end'
                )
            );
        } else {
            $settings = array(
                'section_title' => array(
                    'name'     => __('My Account Settings', 'sample-my-account'),
                    'type'     => 'title',
                    'desc'     => '',
                    'id'       => 'wc_sample_my_account_tab_section_title'
                ),

                'options' => array(
                    'name' => __('Options', 'sample-my-account'),
                    'type' => 'textarea',
                    'desc' => __('Add options separated by a comma.', 'sample-my-account'),
                    'id'   => 'wc_sample_my_account_tab_options'
                ),
                'section_end' => array(
                    'type' => 'sectionend',
                    'id' => 'wc_sample_my_account_tab_section_end'
                )
            );
        }
    }
    return apply_filters('wc_sample_my_account_tab_settings', $settings);
}

add_action('woocommerce_update_options_sample_my_account_tab', 'sample_my_account_update_settings');
function sample_my_account_update_settings()
{
    woocommerce_update_options(sample_my_account_get_settings());
}
