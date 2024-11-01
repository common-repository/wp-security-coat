<?php

/**
 *
 * wp coat php mysql vulnerabilities
 *
 * @link       http://wpsecuritycoat.com
 * @since      1.0.0
 *
 * @package    Wp_Seccoat
 * @subpackage Wp_Seccoat/admin/partials
 */
?>

<div id="admin-php-mysql-security" class="wrap metabox-holder columns-2 wp_seccoat-metaboxes hidden">



                <div id="icon-options-general" class="icon32"></div>
	<h1 style="visibility: hidden;"><?php esc_attr_e( 'Configure Settings To Protect From Wordpress Vulnerabilities', $this->plugin_name ); ?></h1>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable <?php if($filter_suspicious_query_strings ==1){ echo 'active';} ?>">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle" style="padding-left: 25px; font-size: 22px;"><span><?php esc_attr_e( 'Protect From SQL Injection', $this->plugin_name ); ?></span>
						</h2>

						<div class="inside">

                                                        <fieldset>
                                                            <legend class="screen-reader-text"><span><?php _e('Filter Susicious Query Strings', $this->plugin_name); ?></span></legend>
                                                            <label for="<?php echo $this->plugin_name; ?>-filter_suspicious_query_strings">
                                                                <input type="checkbox" id="<?php echo $this->plugin_name;?>-filter_suspicious_query_strings" name="<?php echo $this->plugin_name; ?>[filter_suspicious_query_strings]" value="1" <?php echo checked($filter_suspicious_query_strings, 1); ?>/>
                                                                <span style="font-size: 20px;"><?php esc_attr_e('Filter Suspicious Query Strings ', $this->plugin_name); ?></span>
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

				<div class="meta-box-sortables ui-sortable <?php if($iframing_protection ==1){ echo 'active';} ?>">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle" style="padding-left: 25px; font-size: 22px;"><span><?php esc_attr_e( 'Add Click jacking(iframing) Protection', $this->plugin_name ); ?></span>
						</h2>

						<div class="inside">
                                                         
                                                        <fieldset>
                                                            <legend class="screen-reader-text"><span><?php _e('Add Click jacking(iframing) Protection', $this->plugin_name); ?></span></legend>
                                                            <label for="<?php echo $this->plugin_name; ?>-iframing_protection">
                                                                <input type="checkbox" id="<?php echo $this->plugin_name;?>-iframing_protection" name="<?php echo $this->plugin_name; ?>[iframing_protection]" value="1" <?php echo checked($iframing_protection, 1); ?>/>
                                                                <span style="font-size: 20px;"><?php esc_attr_e('Enable Click jacking(iframe) Protection', $this->plugin_name); ?></span>
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

				<div class="meta-box-sortables ui-sortable <?php if($protect_system_files ==1){ echo 'active';} ?>">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle" style="padding-left: 25px; font-size: 22px;"><span><?php esc_attr_e( 'Protect System Files', $this->plugin_name ); ?></span>
						</h2>

						<div class="inside">
                                                                                       
                                                    <fieldset>
                                                        <legend class="screen-reader-text"><span><?php _e('Protect System Files ', $this->plugin_name); ?></span></legend>
                                                        <label for="<?php echo $this->plugin_name; ?>-protect_system_files">
                                                            <input type="checkbox" id="<?php echo $this->plugin_name;?>-protect_system_files" name="<?php echo $this->plugin_name; ?>[protect_system_files]" value="1" <?php echo checked($protect_system_files, 1); ?>/>
                                                            <span style="font-size: 20px;"><?php esc_attr_e('Protect System Files ', $this->plugin_name); ?></span>
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

				<div class="meta-box-sortables ui-sortable <?php if($cross_site_protection ==1){ echo 'active';} ?>">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle" style="padding-left: 25px; font-size: 22px;"><span><?php esc_attr_e( 'Add Cross Site Scripting Protection', $this->plugin_name ); ?></span>
						</h2>

						<div class="inside">
                                                                                          
                                                      <fieldset>
                                                        <legend class="screen-reader-text"><span><?php _e('Add Cross Site Scripting Protection', $this->plugin_name); ?></span></legend>
                                                        <label for="<?php echo $this->plugin_name; ?>-cross_site_protection">
                                                            <input type="checkbox" id="<?php echo $this->plugin_name;?>-cross_site_protection" name="<?php echo $this->plugin_name; ?>[cross_site_protection]" value="1" <?php echo checked($cross_site_protection, 1); ?>/>
                                                            <span style="font-size: 20px;"><?php esc_attr_e('Enable Cross Site Scripting Protection ', $this->plugin_name); ?></span>
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
