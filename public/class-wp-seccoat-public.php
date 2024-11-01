<?php

/**
 * The public-facing functionality of wp security Coat
 *
 * @link       http://wpsecuritycoat.com
 * @since      1.0.0
 *
 * @package    Wp_Seccoat
 * @subpackage Wp_Seccoat/public
 */

/**

 *
 * @package    Wp_Seccoat
 * @subpackage Wp_Seccoat/public
 * @author     Leon Mwandiringa <tinashe.leon@yahoo.com>
 */
class Wp_Seccoat_Public {

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
	
	


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->wp_seccoat_options = get_option($this->plugin_name);

	}

	/**

	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		//adding the public styles

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-seccoat-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
                //adding the public scripts
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-seccoat-public.js', array( 'jquery' ), $this->version, false );

	}
	
	//hide wp version
	public function hide_wp_version(){
	
            if(!empty($this->wp_seccoat_options['hide_wp_version'])){
            
                remove_action('wp_head', 'wp_generator');

            }	
            
	}
	
	/*public function remove_style_and_js_versions(){
            
            if(!empty($this->wp_seccoat_options['hide_wp_version'])){
                
                $src = 9999;
                
                if ( strpos( $src, 'ver=' ) ){
                    $src = remove_query_arg( 'ver', $src );
                }
                return $src;
            }
             
	}*/
	
	//remove feeds and rsd
	public function remove_feeds_and_rsd(){
            
            if(!empty($this->wp_seccoat_options['remove_feeds_and_rsd'])){
                
                remove_action( 'wp_head', 'rsd_link' );                 
                remove_action( 'wp_head', 'feed_links_extra', 3 );           
                remove_action( 'wp_head', 'feed_links', 2 );  
               
            }
             
	}
	

	
	//disable rest api
	public function disable_rest_api(){
            
            if(!empty($this->wp_seccoat_options['disable_rest_api'])){
                
                return new WP_Error(
        		'rest_cannot_access','The REST API for WordPress is disabled.',
         		array('status' => rest_authorization_required_code())
    		);
               
            }
             
	}
	
	//disable xml rpc trackback
	public function disable_xmlrpc_pingback_trackback($methods){
            
            if(!empty($this->wp_seccoat_options['disable_xmlrpc_pingback_trackback'])){
                
                unset( $methods['pingback.ping'] );
		return $methods;
               
            }
             
	}


}
