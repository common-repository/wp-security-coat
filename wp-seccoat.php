<?php

/**
 *
 *
 * @link              http://wpsecuritycoat.com
 * @since             1.0.0
 * @package           Wp_Seccoat
 *
 * @wordpress-plugin
 * Plugin Name:       WP Security Coat
 * Plugin URI:        http://wpsecuritycoat.com
 * Description:       This is a security plugin for preventing you wordpress website from being hacked, Loaded with security feautures from securing core wordpres functionality, preventing php/mysql vulnerabiulites and also server security making you wordpress website super secure
 * Version:           1.0.0
 * Author:            Leon Mwandiringa
 * Author URI:        http://techadon.tech
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-seccoat
 * Domain Path:       /languages
 */
//TECHADON BABA
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 */
function activate_wp_seccoat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-seccoat-activator.php';
	Wp_Seccoat_Activator::activate();
}

/**
 */
function deactivate_wp_seccoat() {

        
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-seccoat-deactivator.php';
	Wp_Seccoat_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_seccoat' );
register_deactivation_hook( __FILE__, 'deactivate_wp_seccoat' );

/**
 *NO NEED FOR TALK LETS DO THIS    - cite= sf5 guile 
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-seccoat.php';



/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_wp_seccoat() {

	$plugin = new Wp_Seccoat();
	$plugin->run();

}
run_wp_seccoat();