<?php

/**
 * Plugin Name:     Woo Admin Sample
 * Plugin URI:      https://github.com/mevolkan/woo-admin-sample
 * Description:     This plugin fetches headers and displays the as a widget and in the My Account tab in woocommerce settings
 * Author:          Samuel Nzaro
 * Author URI:      https://github.com/mevolkan/
 * Text Domain:     woo-admin-sample
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Woo_Admin_Sample
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Plugin activation hook

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    register_activation_hook(
        __FILE__,
        'my_api_plugin_activate'
    );
} else {
    add_action('admin_notices', 'my_api_plugin_missing_woocommerce_notice');
    register_deactivation_hook(
        __FILE__,
        'my_api_plugin_deactivate'
    );
}

function my_api_plugin_activate()
{
    // Your activation code here
}

function my_api_plugin_deactivate()
{
    // Your activation code here
}

function my_api_plugin_missing_woocommerce_notice()
{
    echo '<div class="error"><p>';
    echo 'This Plugin requires WooCommerce. Please install and activate WooCommerce to use this plugin.';
    echo '</p></div>';
}


require_once(plugin_dir_path(__FILE__) . 'includes/settings-page.php');
require_once(plugin_dir_path(__FILE__) . 'includes/api-functions.php');
require_once(plugin_dir_path(__FILE__) . 'includes/templates.php');
