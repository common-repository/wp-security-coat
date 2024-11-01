<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
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
class Wp_Seccoat {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Wp_Seccoat_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;
	


	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'wp-seccoat';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Wp_Seccoat_Loader. Orchestrates the hooks of the plugin.
	 * - Wp_Seccoat_i18n. Defines internationalization functionality.
	 * - Wp_Seccoat_Admin. Defines all hooks for the admin area.
	 * - Wp_Seccoat_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-seccoat-loader.php';
		
		/**
		*all the htacces code for injection
		*adding to to the dependencies codebase
		*/
		require_once plugin_dir_path( dirname(__FILE__) ).'includes/class-htaccess-arch.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-seccoat-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-seccoat-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wp-seccoat-public.php';

		$this->loader = new Wp_Seccoat_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Wp_Seccoat_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Wp_Seccoat_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Wp_Seccoat_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
                
                //registering admin menu
                $this->loader->add_action('admin_menu',$plugin_admin, 'wp_seccoat_add_menu_page');
                
                //registering saving option
                $this->loader->add_action('admin_init', $plugin_admin, 'register_settings');
                
                //disable login errors
                $this->loader->add_action('login_errors', $plugin_admin, 'disable_login_error_messages');
                
                //disable login shake
                $this->loader->add_action('login_head', $plugin_admin, 'disable_login_error_shake');
                
                $this->loader->add_action('init', $plugin_admin, 'set_htaccess_rules');
                
                //$plugin_admin->writey();
	}
            
	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Wp_Seccoat_Public( $this->get_plugin_name(), $this->get_version() );
		
                 //enqueing of script for the frontend   
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		
		//hide version 
		$this->loader->add_action( 'init', $plugin_public, 'hide_wp_version');
		
		//remove feeds and rsd links
		$this->loader->add_action( 'init', $plugin_public, 'remove_feeds_and_rsd');
		
		//disable rest api
		$this->loader->add_action( 'rest_authentication_errors', $plugin_public, 'disable_rest_api');
		
		//disable xmlrpc pingback
		$this->loader->add_action( 'xmlrpc_methods', $plugin_public, 'disable_xmlrpc_pingback_trackback');
		
		//$this->loader->add_filter( 'style_loader_src', $plugin_public, 'remove_style_and_js_versions');
		//$this->loader->add_filter( 'script_loader_src', $plugin_public, 'remove_style_and_js_versions');

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}
	/**
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Wp_Seccoat_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
	

}
