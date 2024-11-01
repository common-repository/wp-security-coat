<?php

/**
 *
 * @link       http://wpsecuritycoat.com
 * @since      1.0.0
 *
 * @package    Wp_Seccoat
 * @subpackage Wp_Seccoat/admin
 */

/**
 *
 * @package    Wp_Seccoat
 * @subpackage Wp_Seccoat/admin
 * @author     Leon Mwandiringa <tinashe.leon@yahoo.com>
 */
class Wp_Seccoat_Admin {

	/**
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	
	private $wp_seccoat_options;
	
    private $file_handle;
	
	
	private $same_line;
        /**
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       .
	 * @param      string    $version    
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->wp_seccoat_options = get_option($this->plugin_name);
		

	}


	public function enqueue_styles() {

		//enquing admin facing styling

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-seccoat-admin.css');

	}
	


	//setting htaccess rules
        public function set_htaccess_rules(){
        
            //changing permissions silently
            @chmod(ABSPATH.".htaccess", 0644);
            
            //open file for writing
            $this->file_handle = fopen(ABSPATH.".htaccess", "a+") or die("Error Writing to the HTACCESS ");
             //read file               
            $this->same_line = fread($this->file_handle, filesize(ABSPATH.".htaccess"));
            
            //disallow indexing of files
            $this->write_to_file_if_string_not_existent(htaccessarch::disallow_indexing_files(), $this->wp_seccoat_options['index_files']);
            
            //disable xml rpc attack
            $this->write_to_file_if_string_not_existent(htaccessarch::disable_xml_rpc_file(), $this->wp_seccoat_options['disable_xml_rpc_file']);
            
            //protect system files 
             $this->write_to_file_if_string_not_existent(htaccessarch::protect_system_files(), $this->wp_seccoat_options['protect_system_files']);
            
            //protect from sql injetcion
            $this->write_to_file_if_string_not_existent(htaccessarch::protect_sql_injection(), $this->wp_seccoat_options['filter_suspicious_query_strings']);
            
            //block fake robots
             $this->write_to_file_if_string_not_existent(htaccessarch::block_fake_bots(), $this->wp_seccoat_options['block_fake_bots']);
             
             //block suspicious http methods
              $this->write_to_file_if_string_not_existent(htaccessarch::block_suspicious_http_methods(), $this->wp_seccoat_options['block_suspicious_http_methods']);
              
              $this->write_to_file_if_string_not_existent(htaccessarch::cross_site_protection(), $this->wp_seccoat_options['cross_site_protection']);
              
              $this->write_to_file_if_string_not_existent(htaccessarch::iframing_protection(), $this->wp_seccoat_options['iframing_protection']);
              
              $this->write_to_file_if_string_not_existent(htaccessarch::content_sniffing_protection(), $this->wp_seccoat_options['content_sniffing_protection']);

              
              
              //write wpsecuritycoat signature on the file
              $this->add_wpseccoat_signatures();
              
            //closing file
            fclose($this->file_handle);
        }
        
        public function add_wpseccoat_signatures(){
            $wp_seccoat_signature = "\n<IfModule mod_headers.c>
Header set X-Powered-By 'Wordpress Security Coat'
</IfModule>\n";
        
            if(strpos($this->same_line, $wp_seccoat_signature) != true){
                
                fwrite($this->file_handle, $wp_seccoat_signature);
            }
        
        }
        
        //method for checking and writing to htacces if feature not added
        public function write_to_file_if_string_not_existent($rule, $option){
            
                if(!empty($option)){
                
                        //$same_line = fgets($this->file_handle);
                        if(strpos($this->same_line, $rule) != true){
                        //file_put_contents($this->htaccess, self::dissallow_indexing_files(), FILE_APPEND);
                            fwrite($this->file_handle, $rule);
                        }
                 
                }else{
                
                    //check if line exists and then remove
                    if(strpos($this->same_line, $rule) == true){
                        
                        file_put_contents(ABSPATH.".htaccess", str_replace($rule , "", file_get_contents(ABSPATH.".htaccess")));
                       
                        
                    }
                }
        
        }
	
	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		//enquing admin facing script
		 

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-seccoat-admin.js', array( 'jquery' ));

	}
	

                public function wp_seccoat_add_menu_page(){
                
                
                    add_menu_page('WP Security Coat settings', 'WP Security Coat', 'manage_options', $this->plugin_name, array($this, 'wp_seccoat_page_content'), plugin_dir_url(__FILE__).'images/wpsecuritycoat2.png', 80);
                
                
                }
                
                public function wp_seccoat_page_content(){
                
                   include_once( 'partials/wp-seccoat-admin-display.php' );
                
                
                }

                
                public function validate_settings($input) {
                    // All checkboxes inputs        
                    $valid = array();
                    
                    //security
                    $valid['hide_wp_version'] = (isset($input['hide_wp_version']) && !empty($input['hide_wp_version'])) ? 1 : 0;
                    
                    $valid['index_files'] = (isset($input['index_files']) && !empty($input['index_files'])) ? 1: 0;
                    
                    $valid['disable_xml_rpc_file'] = (isset($input['disable_xml_rpc_file']) && !empty($input['disable_xml_rpc_file'])) ? 1 : 0;
                    
                    $valid['block_fake_bots'] = (isset($input['block_fake_bots']) && !empty($input['block_fake_bots'])) ? 1 : 0;
                    
                    $valid['disable_rest_api'] = (isset($input['disable_rest_api']) && !empty($input['disable_rest_api'])) ? 1 : 0;
                    
                    $valid['disable_xmlrpc_pingback_trackback'] = (isset($input['disable_xmlrpc_pingback_trackback']) && !empty($input['disable_xmlrpc_pingback_trackback'])) ? 1 : 0;
                    
                    $valid['disable_login_error_messages'] = (isset($input['disable_login_error_messages']) && !empty($input['disable_login_error_messages'])) ? 1 : 0;
                    
                    $valid['iframing_protection'] = (isset($input['iframing_protection']) && !empty($input['iframing_protection'])) ? 1 : 0;
                    
                    $valid['content_sniffing_protection'] = (isset($input['content_sniffing_protection']) && !empty($input['content_sniffing_protection'])) ? 1 : 0;
                    
                    $valid['cross_site_protection'] = (isset($input['cross_site_protection']) && !empty($input['cross_site_protection'])) ? 1 : 0;
                    
                    $valid['filter_suspicious_query_strings'] = (isset($input['filter_suspicious_query_strings']) && !empty($input['filter_suspicious_query_strings'])) ? 1 : 0;
                    
                    $valid['protect_system_files'] = (isset($input['protect_system_files']) && !empty($input['protect_system_files'])) ? 1 : 0;
                    
                    $valid['block_suspicious_http_methods'] = (isset($input['block_suspicious_http_methods']) && !empty($input['block_suspicious_http_methods'])) ? 1 : 0;
                    
                    $valid['disable_wp_json_functionality'] = (isset($input['disable_wp_json_functionality']) && !empty($input['disable_wp_json_functionality'])) ? 1 : 0;
                
                    $valid['remove_feeds_and_rsd'] = (isset($input['remove_feeds_and_rsd']) && !empty($input['remove_feeds_and_rsd'])) ? 1 : 0;
                    //performance
                    
                    return $valid;
                }
                    


                
                public function register_settings(){
                
                
                    register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate_settings'));
                
                }
                
                public function disable_login_error_messages(){
                
                    if(!empty($this->wp_seccoat_options['disable_login_error_messages'])){
                    
                        return " ";
                        
                    }
                }
                
                public function disable_login_error_shake(){
                
                    if(!empty($this->wp_seccoat_options['disable_login_error_messages'])){
                    
                        remove_action('login_head', 'wp_shake_js', 12);
                    
                    }
                }

}
