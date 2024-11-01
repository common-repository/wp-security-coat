<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://wpsecuritycoat.com
 * @since      1.0.0
 *
 * @package    Wp_Seccoat
 * @subpackage Wp_Seccoat/includes
 */

/**
 *
 * @since      1.0.0
 * @package    Wp_Seccoat
 * @subpackage Wp_Seccoat/includes
 * @author     Leon Mwandiringa <tinashe.leon@yahoo.com>
 */
 
 require_once plugin_dir_path( dirname(__FILE__) ).'includes/class-htaccess-arch.php';
 
class Wp_Seccoat_Deactivator {
        
	/**
	 * Code execution on deactivate removing some htaccess rules
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
	
	//removal of rules from the htaccess
	
	file_put_contents(ABSPATH.".htaccess", str_replace(htaccessarch::disallow_indexing_files() , "", file_get_contents(ABSPATH.".htaccess")));
	
	file_put_contents(ABSPATH.".htaccess", str_replace(htaccessarch::disable_xml_rpc_file() , "", file_get_contents(ABSPATH.".htaccess")));
	
	file_put_contents(ABSPATH.".htaccess", str_replace(htaccessarch::protect_system_files() , "", file_get_contents(ABSPATH.".htaccess")));
	
	file_put_contents(ABSPATH.".htaccess", str_replace(htaccessarch::protect_sql_injection() , "", file_get_contents(ABSPATH.".htaccess")));
	
	file_put_contents(ABSPATH.".htaccess", str_replace(htaccessarch::block_fake_bots() , "", file_get_contents(ABSPATH.".htaccess")));
	
	file_put_contents(ABSPATH.".htaccess", str_replace(htaccessarch::block_suspicious_http_methods() , "", file_get_contents(ABSPATH.".htaccess")));
	
	file_put_contents(ABSPATH.".htaccess", str_replace(htaccessarch::cross_site_protection() , "", file_get_contents(ABSPATH.".htaccess")));
	
	file_put_contents(ABSPATH.".htaccess", str_replace(htaccessarch::iframing_protection() , "", file_get_contents(ABSPATH.".htaccess")));
	
	file_put_contents(ABSPATH.".htaccess", str_replace(htaccessarch::content_sniffing_protection() , "", file_get_contents(ABSPATH.".htaccess")));
	
	

	}

}
