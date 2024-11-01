<?php 

/** 
* 
* @link       http://wpsecuritycoat.com
* @since      1.0.0 
* 
* @package    Wp_Seccoat 
* @subpackage Wp_Seccoat/admin/partials 
*/ 
?> 
<script>

jQuery(document).ready(function(){

var $elem = jQuery(".wp_seccoat-metaboxes .meta-box-sortables input[type='checkbox']");

                $elem.click(function(){

                            jQuery(this).closest(".meta-box-sortables").toggleClass("active");

                }).change();
                
});

</script>


   
<div class="wrap"> 
    <h2 style="visibility: hidden; display: none;"><?php echo esc_html( get_admin_page_title() ); ?></h2> 

     <!--<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>--> 
    <img src="<?php echo plugin_dir_url(__FILE__).'../images/scpages.png';?>" class="wp-seccoat-header-image"> 

<?php settings_errors(); ?> 
<h1 class="wp-seccoat-tab-main nav-tab-wrapper"> 
    <a href="#admin-worpdress-security" class="wp-seccoat-tab-single nav-tab nav-tab-active"><span class="dashicons dashicons-admin-settings"></span><?php  _e('Worpress Security', $this->plugin_name); ?></a> 
    <a href="#admin-php-mysql-security" class="nav-tab wp-seccoat-tab-single"><span class="dashicons dashicons-admin-site"></span><?php  _e('Php/Mysql Security', $this->plugin_name); ?></a> 
    <a href="#admin-server-security" class="wp-seccoat-tab-single nav-tab"><span class="dashicons dashicons-shield"></span><?php  _e('Server Security', $this->plugin_name); ?></a> 
</h1> 


    <form method="post" name="wp_secoat_options" action="options.php"> 
     
        <?php 
        //adding nonce ,option page ,http referer and action page 
        $options = get_option($this->plugin_name); 

        //defining variables for every section 
        $hide_wp_version = $options['hide_wp_version']; 
         
        $index_files = $options['index_files']; 
        $iframing_protection = $options['iframing_protection']; 
        $disable_xml_rpc_file = $options['disable_xml_rpc_file']; 
        $block_fake_bots = $options['block_fake_bots'];
        $disable_rest_api = $options['disable_rest_api']; 
        $disable_xmlrpc_pingback_trackback = $options['disable_xmlrpc_pingback_trackback']; 
        $disable_login_error_messages = $options['disable_login_error_messages']; 
        $disable_rest_api = $options['disable_rest_api']; 
        $content_sniffing_protection = $options['content_sniffing_protection']; 
        $cross_site_protection = $options['cross_site_protection']; 
        $filter_suspicious_query_strings = $options['filter_suspicious_query_strings']; 
        $protect_system_files = $options['protect_system_files']; 
        $block_suspicious_http_methods = $options['block_suspicious_http_methods']; 
        $remove_feeds_and_rsd = $options['remove_feeds_and_rsd']; 
         
         // adding nonce and hidden fields for auth
        settings_fields($this->plugin_name); 
        do_settings_sections($this->plugin_name); 

        require_once('wp-secoat-admin-security-wordpress.php'); 
        require_once('wp-secoat-admin-security-server.php'); 
        require_once('wp-secoat-admin-security-php-mysql.php'); 
        ?> 

        <?php submit_button('Save all changes', 'primary','submit', TRUE); ?> 

    </form> 

</div> 

<!-- This file should primarily consist of HTML with a little bit of PHP. --> 