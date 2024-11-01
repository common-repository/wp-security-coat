<?php

/**
 * 
 *
 * wp coat Server Security
 *
 * @link       http://wpsecuritycoat.com
 * @since      1.0.0
 *
 * @package    Wp_Seccoat
 * @subpackage Wp_Seccoat/admin/partials
 */
?>


<div id="admin-server-security" class="wrap metabox-holder columns-2 wp_seccoat-metaboxes hidden">

                <div id="icon-options-general" class="icon32"></div>
	<h1 style="visibility: hidden;"><?php esc_attr_e( 'Configure Settings To Protect From Wordpress Vulnerabilities', $this->plugin_name ); ?></h1>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable <?php if($index_files ==1){ echo 'active';} ?>">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle" style="padding-left: 25px; font-size: 22px;"><span><?php esc_attr_e( 'Disallow Indexing of Files in the site Directory', $this->plugin_name); ?></span>
						</h2>

						<div class="inside">
                                                                                                    
                                                            <fieldset>
                                                            <legend class="screen-reader-text"><span><?php _e('Disallow Indexing of Files in the site Directory', $this->plugin_name) ?></span></legend>
                                                            <label for="<?php echo $this->plugin_name; ?>-index_files">
                                                                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-index_files" name="<?php echo $this->plugin_name; ?>[index_files]" value="1" <?php echo checked($index_files, 1); ?>/>
                                                                <span style="font-size: 20px;"><?php esc_attr_e('Disallow Indexing of Files in the site Directory', $this->plugin_name); ?></span>
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

				<div class="meta-box-sortables ui-sortable <?php if($block_fake_bots ==1){ echo 'active';} ?>">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle" style="padding-left: 25px; font-size: 22px;"><span><?php esc_attr_e( 'Block Fake Bots', $this->plugin_name); ?></span>
						</h2>

						<div class="inside">
                                                                                                    
                                                    <fieldset>
                                                        <legend class="screen-reader-text"><span><?php _e('block from human scans and fake bots', $this->plugin_name) ?></span></legend>
                                                        <label for="<?php echo $this->plugin_name; ?>-block_fake_bots">
                                                            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-block_fake_bots" name="<?php echo $this->plugin_name; ?>[block_fake_bots]" value="1" <?php echo checked($block_fake_bots, 1); ?>/>
                                                            <span style="font-size: 20px;"><?php esc_attr_e('Block from human scans and fake bots', $this->plugin_name); ?></span>
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

				<div class="meta-box-sortables ui-sortable <?php if($content_sniffing_protection ==1){ echo 'active';} ?>">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle" style="padding-left: 25px; font-size: 22px;"><span><?php esc_attr_e( 'Add Content Sniffing Protection', $this->plugin_name); ?></span>
						</h2>

						<div class="inside">
                                                                                                   
                                                    <fieldset>
                                                        <legend class="screen-reader-text"><span><?php _e('Add Content Sniffing Protection', $this->plugin_name); ?></span></legend>
                                                        <label for="<?php echo $this->plugin_name; ?>-content_sniffing_protection">
                                                            <input type="checkbox" id="<?php echo $this->plugin_name;?>-content_sniffing_protection" name="<?php echo $this->plugin_name; ?>[content_sniffing_protection]" value="1" <?php echo checked($content_sniffing_protection, 1); ?>/>
                                                            <span style="font-size: 20px;"><?php esc_attr_e('Enable Content Sniffing Protection ', $this->plugin_name); ?></span>
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

				<div class="meta-box-sortables ui-sortable <?php if($block_suspicious_http_methods ==1){ echo 'active';} ?>">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle" style="padding-left: 25px; font-size: 22px;"><span><?php esc_attr_e( 'Block Suspicious HTTP Methods', $this->plugin_name ); ?></span>
						</h2>

						<div class="inside">
                                                                                                   
                                                    <fieldset>
                                                        <legend class="screen-reader-text"><span><?php _e('Block Suspicious HTTP Methods ', $this->plugin_name); ?></span></legend>
                                                        <label for="<?php echo $this->plugin_name; ?>-block_suspicious_http_methods">
                                                            <input type="checkbox" id="<?php echo $this->plugin_name;?>-block_suspicious_http_methods" name="<?php echo $this->plugin_name; ?>[block_suspicious_http_methods]" value="1" <?php echo checked($block_suspicious_http_methods, 1); ?>/>
                                                            <span style="font-size: 20px;"><?php esc_attr_e('Block Suspicious HTTP Methods ', $this->plugin_name); ?></span>
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

			

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->


        
</div>