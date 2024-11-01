<?php

/**
 * Fired when the plugin is uninstalled.
 *
 *
 * @link       http://wpsecuritycoat.com
 * @since      1.0.0
 *
 * @package    Wp_Seccoat
 */
// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

//remove oprions from db when deleting plugin
delete_option( 'wp-seccoat' );