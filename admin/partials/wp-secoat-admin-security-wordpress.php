<?php

/**
 *
 * wp coat wordpress security
 *
 * @link       http://wpsecuritycoat.com
 * @since      1.0.0
 *
 * @package    Wp_Seccoat
 * @subpackage Wp_Seccoat/admin/partials
 */
?>


<div id="admin-worpdress-security" class="wrap metabox-holder columns-2 wp_seccoat-metaboxes">

        <div id="icon-options-general" class="icon32"></div>
	<h1 style="visibility: hidden;"><?php esc_attr_e( 'Configure Settings To Protect From Wordpress Vulnerabilities', $this->plugin_name ); ?></h1>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable <?php if($hide_wp_version ==1){ echo 'active';} ?>">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle" style="padding-left: 25px; font-size: 22px;"><span><?php esc_attr_e( 'Hide wordpress version', $this->plugin_name ); ?></span>
						</h2>

						<div class="inside">
                                                                                                    
                                                    <fieldset>
                                                        <legend class="screen-reader-text"><span><?php _e('Hide wordpress version in meta tags and resource files', $this->plugin_name) ?></span></legend>
                                                        
                                                       
                                                        <label for="<?php echo $this->plugin_name; ?>-hide_wp_version">
                                                            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-hide_wp_version" name="<?php echo $this->plugin_name; ?>[hide_wp_version]" value="1" <?php echo checked($hide_wp_version, 1); ?>/></span>
                                                            <span style="font-size: 20px;"><?php esc_attr_e('Hide wordpress version in meta tags and resource files', $this->plugin_name); ?>
                                                        </label>
                                                    </fieldset>
                                                   
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->
			
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle" style="text-align: center;"><span><?php esc_attr_e(
									'Save Your Settings', $this->plugin_name
								); ?></span></h2>

						<div class="inside">
							<div style="margin: auto; padding-left: 70px;"><?php submit_button('Save all changes', 'primary','submit', TRUE); ?></div>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->
			
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable <?php if($disable_xml_rpc_file ==1){ echo 'active';} ?>">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle" style="padding-left: 25px; font-size: 22px;"><span><?php esc_attr_e( 'Disable XML-RPC File', $this->plugin_name ); ?></span>
						</h2>

						<div class="inside">
                                                                                   
                                                        <fieldset>
                                                            <legend class="screen-reader-text"><span><?php _e('Disable XML-RPC File', $this->plugin_name) ?></span></legend>
                                                            <label for="<?php echo $this->plugin_name; ?>-disable_xml_rpc_file">
                                                                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-disable_xml_rpc_file" name="<?php echo $this->plugin_name; ?>[disable_xml_rpc_file]" value="1" <?php echo checked($disable_xml_rpc_file, 1); ?>/>
                                                                <span style="font-size: 20px;"><?php esc_attr_e('Disable XML RPC File', $this->plugin_name); ?></span>
                                                            </label>
                                                        </fieldset>
                                                    
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->
			</div>
			<!-- post-body-content -->
			
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable <?php if($disable_rest_api ==1){ echo 'active';} ?>">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle" style="padding-left: 25px; font-size: 22px;"><span><?php esc_attr_e( 'Disable Wp REST Api', $this->plugin_name ); ?></span>
						</h2>

						<div class="inside">
                                                                                      
                                                        <fieldset>
                                                        <legend class="screen-reader-text"><span><?php _e('Disable Wp REST Api Functionality', $this->plugin_name) ?></span></legend>
                                                        <label for="<?php echo $this->plugin_name; ?>-disable_rest_api">
                                                            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-disable_rest_api" name="<?php echo $this->plugin_name; ?>[disable_rest_api]" value="1" <?php echo checked($disable_rest_api, 1); ?>/>
                                                            <span style="font-size: 20px;"><?php esc_attr_e('Disable Wp REST Api Functionality', $this->plugin_name); ?></span>
                                                        </label>
                                                    </fieldset>
                                                        
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->
			</div>
			<!-- post-body-content -->
			
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable <?php if($disable_xmlrpc_pingback_trackback ==1){ echo 'active';} ?>">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle" style="padding-left: 25px; font-size: 22px;"><span><?php esc_attr_e( 'Restrict XML-RPC FIle From Pingback', $this->plugin_name ); ?></span>
						</h2>

						<div class="inside">
                                                                                             
                                                    <fieldset>
                        
                                                        <label for="<?php echo $this->plugin_name; ?>-disable_xmlrpc_pingback_trackback">
                                                            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-disable_xmlrpc_pingback_trackback" name="<?php echo $this->plugin_name; ?>[disable_xmlrpc_pingback_trackback]" value="1" <?php echo checked($disable_rest_api, 1); ?>/>
                                                            <span style="font-size: 20px;"><?php esc_attr_e('Restrict XML-RPC FIle From Pingback and Trackback', $this->plugin_name); ?></span>
                                                        </label>
                                                    </fieldset>
                                                    
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->
			</div>
			<!-- post-body-content -->
			
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable <?php if($disable_login_error_messages ==1){ echo 'active';} ?>">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle" style="padding-left: 25px; font-size: 22px;"><span><?php esc_attr_e( 'Disable Login error Messages', $this->plugin_name ); ?></span>
						</h2>

						<div class="inside">
                                                                                                    
                                                    <fieldset>
                                                        <legend class="screen-reader-text"><span><?php _e('Disable Login error Messages', $this->plugin_name); ?></span></legend>
                                                        <label for="<?php echo $this->plugin_name; ?>-disable_login_error_messages">
                                                            <input type="checkbox" id="<?php echo $this->plugin_name;?>-disable_login_error_messages" name="<?php echo $this->plugin_name; ?>[disable_login_error_messages]" value="1" <?php echo checked($disable_login_error_messages, 1); ?>/>
                                                            <span style="font-size: 20px;"><?php esc_attr_e('Disable Login Error Messages', $this->plugin_name); ?></span>
                                                        </label>
                                                    </fieldset>
                                                    
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->
			</div>
			<!-- post-body-content -->
			
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable <?php if($remove_feeds_and_rsd ==1){ echo 'active';} ?>">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle" style="padding-left: 25px; font-size: 22px;"><span><?php esc_attr_e( 'Remove Feeds and RSD Links', $this->plugin_name ); ?></span>
						</h2>

						<div class="inside">
                                                                                                    
                                                    <fieldset>
                                                    <legend class="screen-reader-text"><span><?php _e('Remove Feeds and RSD Links', $this->plugin_name); ?></span></legend>
                                                    <label for="<?php echo $this->plugin_name; ?>-remove_feeds_and_rsd">
                                                        <input type="checkbox" id="<?php echo $this->plugin_name;?>-remove_feeds_and_rsd" name="<?php echo $this->plugin_name; ?>[remove_feeds_and_rsd]" value="1" <?php echo checked($remove_feeds_and_rsd, 1); ?>/>
                                                        <span style="font-size: 20px;"><?php esc_attr_e('Remove Feeds and RSD', $this->plugin_name); ?></span>
                                                    </label>
                                                </fieldset>
                                                    
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->
			</div>
			<!-- post-body-content -->
			

			<!-- sidebar -->
			

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->
	

</div>
