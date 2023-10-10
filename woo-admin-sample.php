<?php
/**
 * Plugin Name:     Woo Admin Sample
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     woo-admin-sample
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Woo_Admin_Sample
 */

 // Plugin activation hook
register_activation_hook(__FILE__, 'my_api_plugin_activate');

function my_api_plugin_activate() {
    // Code to run when the plugin is activated
}

require_once(plugin_dir_path(__FILE__) . 'includes/settings-page.php');
require_once(plugin_dir_path(__FILE__) . 'includes/api-functions.php');
require_once(plugin_dir_path(__FILE__) . 'includes/templates.php');
