<div id="SSuprydp_builder_form">
<div class="SSuprydp_col_2 SSuprydp-form-col">
    <h2 class="SSuprydp_bk_title"><?php _e("Sticky CTA Settings", "") ?></h2>
    <form class="SSuprydp_form" id="SSuprydp_form" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>?action=process_pages">  
  
        <div class="SSuprydp_row">
			<div class="SSuprydp_page_fields">
				
				<?php 
					$alertmsg = ( isset( $_GET['SSuprydp_msg'] ) ) ? sanitize_text_field( $_GET['SSuprydp_msg'] ) : '';
				
					if($alertmsg!='' ){
					
					
						if($alertmsg=='success'){
							?>
							<div class="SSuprydp_field_wrap">
								<p class="success_msg"><?php _e("Settings are updated!", "sticky-sidebar"); ?></p>
							</div>
							<?php
						} else if($alertmsg=='failed'){
							?>
							<div class="SSuprydp_field_wrap">
								<p class="error_msg"><?php _e("Settings are not submitted!", "sticky-sidebar"); ?></p>
							</div>
							<?php
						}
					}
				?>
				<div class="SSuprydp_field_wrap">

                    <h3 class="SSuprydp_setting_title"><?php _e("General Settings", "sticky-sidebar"); ?></h3>
                </div>	
	<!-- ----------------------Sticky Sidebar Media-----------------------------  -->	
				<div class="SSuprydp_field_wrap">

                    <label class="heading"><?php _e("Display Settings", "sticky-sidebar"); ?></label>
					<p class="SSuprydp-instructions">
						<!-- 
							<strong>Live</strong> - will display to everyone.<br> 
						<strong>Development</strong> - will only show to admins who are logged in. This is to use when you are testing and updating the easy sticky sidebar.<br>
					<strong>Off</strong> - will not show for anyone
!--> </p>

					<div class="develop_mode">
						<div class="SSuprydp_yes_btn radio_text_style">
							<span><strong>Live</strong></span><input type="radio" name="SSuprydp_development" value="live" <?php if(get_option('SSuprydp_development')=='live' || get_option('SSuprydp_development')==''){ echo 'checked'; }?> class="develop_check" />
						<span>- will display to everyone.</span></div>
						<div class="SSuprydp_yes_btn radio_text_style">
							<span><strong>Development</strong></span><input type="radio" name="SSuprydp_development" value="development" <?php if(get_option('SSuprydp_development')=='development' || get_option('SSuprydp_development')==''){ echo 'checked'; }?> class="develop_check" />
						<span>- will only show to admins who are logged in. This is to use when you are testing and updating the easy sticky cta.</span></div>
						<div class="SSuprydp_no_btn radio_text_style">					
							<span><strong>Off</strong></span><input type="radio" name="SSuprydp_development" value="off" <?php if(get_option('SSuprydp_development')=='off'){ _e("checked", "sticky-sidebar"); }?> class="develop_check" />
						<span>- will not show for anyone</span></div>
					</div>
					
                </div><!-- End wrap -->
					<hr>
				<div class="SSuprydp_field_wrap">
<label class="heading"><?php _e("Scroll Settings", "sticky-sidebar"); ?></label>
				<input type="checkbox" name="SSuprydp_shrink" value="Yes" <?php if(get_option('SSuprydp_shrink')=='Yes'){ echo 'checked'; }?> class="develop_check" /> <label class="heading radio-label"><?php _e("Collapse Before Scroll", "sticky-sidebar"); ?></label>
					<div class="SSuprydp_yes_btn">
							
						</div>
					<p class="SSuprydp-instructions">By default, the cta is displayed and when you scroll the cta shrinks, If you want it to shrink on page load, please use this option.</p>					<div class="develop_mode">
						
					</div>
					
                </div><!-- End wrap -->
				<hr>
				<div class="SSuprydp_field_wrap disabled_m">

                    <label class="heading"><?php _e("Display on Mobile (option coming soon)", "sticky-sidebar"); ?></label>
					<div class="develop_mode">
						<div class="SSuprydp_yes_btn radio_text_style">
							<span>Yes</span><input type="radio" name="SSuprydp_dis_mobile" value="Yes" disabled <?php if(get_option('SSuprydp_dis_mobile')=='Yes'){ echo 'checked'; }?> class="develop_check" />
						</div>
						<div class="SSuprydp_no_btn radio_text_style">					
							<span>No</span><input type="radio" name="SSuprydp_dis_mobile" value="No" <?php if(get_option('SSuprydp_dis_mobile')=='No' || get_option('SSuprydp_dis_mobile')==''){ echo 'checked'; }?> class="develop_check" disabled />
						</div>
					</div>
					
                </div>
				<hr>
				<div class="SSuprydp_field_wrap disabled_m">

                    <label class="heading"><?php _e("Page Location (option coming soon)", "sticky-sidebar"); ?></label>
					<div class="develop_mode">
						
					<select name="SSuprydp_location" class="SSuprydp_location">
						<option value="">All Pages</option>
					</select>
					</div>
					
                </div>

				<hr>
				<div class="SSuprydp_field_wrap">
				<div class="heading"><?php _e("Sticky CTA Banner Image ", "sticky-sidebar"); ?>
				<span data-toggle="image_info" id="image_info" title="<img height='400' src='<?php _e(SSuprydp_URL.'/assets/img/sticky-sidebar-image-instructions.jpg', 'sticky-sidebar'); ?>' />"><i class='fa fa-question-circle'></i>
				</span>
				</div>
						
					<div class="SSuprydp_field_wrap">

						<input type="checkbox" name="SSuprydp_img_hideimg" value="Yes" <?php if(get_option('SSuprydp_img_hideimg')=='Yes'){ echo 'checked'; }?> class="develop_check" /> <label class="heading radio-label"><?php _e("Hide Image", "sticky-sidebar"); ?></label>
						<div class="develop_mode">
							<div class="SSuprydp_img_hideimg">
								
							</div>
						</div>
						
					</div>	
				</div>
				
				<div class="SSuprydp_field_wrap banner_img " <?php if(get_option('SSuprydp_img_hideimg')=='Yes'){ echo 'style="display:none;"'; }?>>
				  <label><?php _e("Please select an image", "sticky-sidebar"); ?></label>
				  <input type="hidden" name="sticky-s-media" id="sticky-s-media" readonly class="SSuprydp_input meta_title" value="<?php _e(get_option('sticky-s-media'), "sticky-sidebar"); ?>" placeholder="Select Image">
				  
					<?php if(get_option('sticky-s-media')){ ?>
					<div class='image-preview-wrapper'>
						<img id='image-preview' src='<?php _e(get_option('sticky-s-media'), "sticky-sidebar"); ?>' height='100'>
					</div>					
					<?php } else {?>
						<div class='image-preview-wrapper'>
						<img id='image-preview' src='<?php echo wp_get_attachment_url( get_option( 'sticky-s-media' ) ); ?>' height='100'>
						</div>
					<?php } ?>
					
					
					<input id="upload_image_button" type="button" class="button" value="<?php _e( 'Media Selector' ); ?>" />
					<input type='hidden' name='image_attachment_id' id='image_attachment_id' value='<?php _e(get_option( 'image_attachment_id' ), "sticky-sidebar") ; ?>'>
					
				</div>	
	<!--------------------------------Sticky sidebar button options--------------------------------->
				
				<hr>
				<div class="SSuprydp_field_wrap">

                    <div class="heading"><?php _e("Sticky CTA button options", "sticky-sidebar"); ?>
						<span data-toggle="image_info1" id="image_info1" title="<img height='400' src='<?php _e(SSuprydp_URL.'/assets/img/sticky-sidebar-button-instructions.jpg', 'sticky-sidebar'); ?>' />"><i class='fa fa-question-circle'></i>
						</span>
					</div>

                </div>
				
				
				<div class="SSuprydp_field_wrap">

                    <label><?php _e("Button Text", "sticky-sidebar"); ?></label>

                    <input type="text" name="SSuprydp_button_option_text" class="SSuprydp_input meta_title" value="<?php _e(get_option('SSuprydp_button_option_text'), "sticky-sidebar") ; ?>" placeholder="Enter button text here">

                </div>
				
				<div class="SSuprydp_field_wrap">
					<input type="hidden" id="SSuprydp_button_option_backg_color_hidden" value="<?php _e(get_option('SSuprydp_button_option_backg_color'), "sticky-sidebar") ; ?>" />
                    <label><?php _e("Button Background Color", "sticky-sidebar"); ?></label>
					<p class="SSuprydp-instructions">Click on the color picker and drag your mouse over the color you want then click on the tear drop to select it.</p>
					<input type="text" name="SSuprydp_button_option_backg_color" id="SSuprydp_button_option_backg_color" class="SSuprydp_input meta_title" value="<?php _e(get_option('SSuprydp_button_option_backg_color'), "sticky-sidebar"); ?>">	
				</div>
				<div class="SSuprydp_field_wrap">
                    <button id="SSuprydp_button_option_backg_color_id" class="button" type="button">Color Picker</button>
                </div>
				
				<div class="SSuprydp_field_wrap">
                    <label><?php _e("Button Font", "sticky-sidebar"); ?></label>
					<p><?php _e(get_option('SSuprydp_button_option_font'), "sticky-sidebar"); ?></p>
					<input id="SSuprydp_button_option_font" name="SSuprydp_button_option_font" type="text" />
				</div>
				
				<div class="SSuprydp_field_wrap">
                    <label><?php _e("Button Font Weight", "sticky-sidebar"); ?></label>
					
					<select name="SSuprydp_button_option_weight" class="SSuprydp_input meta_title">
						<option value="">Select Font Weight</option>
						<?php for($i=1;$i<=9;$i++){
							$sel = $i*100;
						?>
						<option value="<?php echo $sel; ?>" <?php if(get_option('SSuprydp_button_option_weight')==$sel){ echo 'selected="selected"';} ?>><?php echo $sel; ?></option>
						<?php } ?>
					</select>
				</div>
				
				<div class="SSuprydp_field_wrap">
                    <label><?php _e("Button Font Size", "sticky-sidebar"); ?></label>
					
					<select name="SSuprydp_button_option_size" class="SSuprydp_input meta_title">
						<option value="">Select Font Size</option>
						<?php for($i=10;$i<=30;$i++){ 
							$si = $i.'px';
						?>
						<option value="<?php echo $si; ?>" <?php if(get_option('SSuprydp_button_option_size')==$si){ echo 'selected="selected"';} ?>><?php echo $si; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="SSuprydp_field_wrap">
                    <label><?php _e("Button Text Align", "sticky-sidebar"); ?></label>
					
					<select name="SSuprydp_button_option_align" class="SSuprydp_input meta_title">
						<option value="left"  <?php if(get_option('SSuprydp_button_option_align')=='top'){ echo 'selected="selected"';} ?> >Top</option>
						<option value="center"  <?php if(get_option('SSuprydp_button_option_align')=='center'){ echo 'selected="selected"';} ?> >Center</option>
						
						<option value="right"  <?php if(get_option('SSuprydp_button_option_align')=='bottom'){ echo 'selected="selected"';} ?> >Bottom</option>
					</select>
				</div>
				<div class="SSuprydp_field_wrap">
					<input type="hidden" id="SSuprydp_button_option_color_hidden" value="<?php _e(get_option('SSuprydp_button_option_color'), "sticky-sidebar"); ?>" />
                    <label><?php _e("Button Color", "sticky-sidebar"); ?></label>
					<p class="SSuprydp-instructions">Click on the color picker and drag your mouse over the color you want then click on the tear drop to select it.</p>
					<input type="text" name="SSuprydp_button_option_color" id="SSuprydp_button_option_color" class="SSuprydp_input meta_title" value="<?php _e(get_option('SSuprydp_button_option_color'), "sticky-sidebar"); ?>" placeholder="Select Color">	
				</div>
				<div class="SSuprydp_field_wrap">
                    <button id="SSuprydp_button_option_color_id" class="button" type="button">Color Picker</button>
                </div>
				
	<!------------------------Sticky Sidebar Content Options---------------------------->		
				
				<hr>
				<div class="SSuprydp_field_wrap">

                    <div class="heading"><?php _e("Sticky CTA Content Options", "sticky-sidebar"); ?>
					<span data-toggle="image_info2" id="image_info2" title="<img height='400' src='<?php _e(SSuprydp_URL.'/assets/img/sticky-sidebar-content-instructions.jpg', 'sticky-sidebar'); ?>' />"><i class='fa fa-question-circle'></i>
					</span>
					</div>

                </div>
				
				<div class="SSuprydp_field_wrap">

                    <label><?php _e("Content Text", "sticky-sidebar"); ?></label>

                    <textarea type="text" name="SSuprydp_content_option_text" class="SSuprydp_input meta_title" placeholder="Enter Content Text"><?php _e(get_option('SSuprydp_content_option_text'), "sticky-sidebar"); ?></textarea>

                </div>
				<div class="SSuprydp_field_wrap">
					<h4><?php _e("Content Style", "sticky-sidebar"); ?></h4>
				</div>
				
				<div class="SSuprydp_field_wrap">

                    <label><?php _e("Content Font", "sticky-sidebar"); ?></label>

                    <p><?php _e(get_option('SSuprydp_content_option_font'), "sticky-sidebar"); ?></p>
					<input id="SSuprydp_content_option_font" name="SSuprydp_content_option_font" type="text" />
					
			    </div>
				
				<div class="SSuprydp_field_wrap">

                    <label><?php _e("Content Font Weight", "sticky-sidebar"); ?></label>

                    <select name="SSuprydp_content_option_weight" class="SSuprydp_input meta_title">
						<option value="">Select Font Weight</option>
						<?php for($i=1;$i<=9;$i++){ 
							$cow= $i*100;
						 ?>
						<option value="<?php echo $cow; ?>" <?php if(get_option('SSuprydp_content_option_weight')==$cow){ echo 'selected="selected"';} ?>><?php echo $cow; ?></option>
						<?php } ?>
					</select>
					
			    </div>			
				<div class="SSuprydp_field_wrap">
                    <label><?php _e("Button Font Size", "sticky-sidebar"); ?></label>
					
					<select name="SSuprydp_content_option_size" class="SSuprydp_input meta_title">
						<option value="">Select Font Size</option>
						<?php for($i=10;$i<=30;$i++){ 
							$cosi = $i.'px';
						?>
						<option value="<?php echo $cosi; ?>"  <?php if(get_option('SSuprydp_content_option_size')==$cosi){ echo 'selected="selected"';} ?>><?php echo $cosi; ?></option>
						<?php } ?>
					</select>
				</div>
				
				
				<div class="SSuprydp_field_wrap">
					<input type="hidden" id="SSuprydp_content_option_color_hidden" value="<?php _e(get_option('SSuprydp_content_option_color'), "sticky-sidebar"); ?>" />
                    <label><?php _e("Button Color", "sticky-sidebar"); ?></label>
					<p class="SSuprydp-instructions">Click on the color picker and drag your mouse over the color you want then click on the tear drop to select it.</p>
					<input type="text" name="SSuprydp_content_option_color" id="SSuprydp_content_option_color" class="SSuprydp_input meta_title" value="<?php _e(get_option('SSuprydp_content_option_color'), "sticky-sidebar"); ?>" placeholder="Select Color">	
				</div>
				<div class="SSuprydp_field_wrap">
                    <button id="SSuprydp_content_option_color_id" class="button" type="button">Color Picker</button>
                </div>
				
	<!-----------------------Sticky Sidebar Divider Options------------------------------>		
				
				<hr>
				
				<div class="SSuprydp_field_wrap">

                    <div class="heading"><?php _e("Sticky CTA Divider Options", "sticky-sidebar"); ?>
					<span data-toggle="image_info3" id="image_info3" title="<img height='400' src='<?php _e(SSuprydp_URL.'/assets/img/sticky-sidebar-divider-instructions.jpg', 'sticky-sidebar'); ?>' />"><i class='fa fa-question-circle'></i>
					</span>
					
					</div>
					
                </div>
				
				<div class="SSuprydp_field_wrap">
					<input type="hidden" id="SSuprydp_divider_option_color_hidden" value="<?php _e(get_option('SSuprydp_divider_option_color'), "sticky-sidebar"); ?>" />  
					<p class="SSuprydp-instructions">Click on the color picker and drag your mouse over the color you want then click on the tear drop to select it.</p>
					<input type="text" name="SSuprydp_divider_option_color" id="SSuprydp_divider_option_color" class="SSuprydp_input meta_title" value="<?php _e(get_option('SSuprydp_divider_option_color'), "sticky-sidebar"); ?>" placeholder="Select Color">
				</div>
				<div class="SSuprydp_field_wrap">
                    <button id="SSuprydp_divider_option_color_id" class="button" type="button">Color Picker</button>
                </div>
				
	<!----------------------Sticky Sidebar Call to Action Options------------------------->		
				
				<hr>
				
				<div class="SSuprydp_field_wrap">
					<div class="heading"><?php _e("Link Text Options", "sticky-sidebar"); ?>
					<span data-toggle="image_info4" id="image_info4" title="<img height='400' src='<?php _e(SSuprydp_URL.'/assets/img/sticky-sidebar-cta-instructions.jpg', 'sticky-sidebar'); ?>' />"><i class='fa fa-question-circle'></i>
					</span>
					
					</div>
	            </div>
				
				<div class="SSuprydp_field_wrap">
					<label><?php _e("Call to Action Text", "sticky-sidebar"); ?></label>
					<input type="text" name="SSuprydp_action_option_text" id="SSuprydp_action_option_text" class="SSuprydp_input meta_title" value="<?php _e(get_option('SSuprydp_action_option_text'), "sticky-sidebar"); ?>" placeholder="Enter Action Text">
                </div>
				
				<div class="SSuprydp_field_wrap">

                    <label><?php _e("Call to Action Font", "sticky-sidebar"); ?></label>

                    <p><?php _e(get_option('SSuprydp_action_option_font'), "sticky-sidebar"); ?></p>
					<input id="SSuprydp_action_option_font" name="SSuprydp_action_option_font" type="text" />
					
			    </div>
				<div class="SSuprydp_field_wrap">

                    <label><?php _e("Call to Action Font Weight", "sticky-sidebar"); ?></label>

                    <select name="SSuprydp_action_option_weight" class="SSuprydp_input meta_title">
						<option value="">Select Font Weight</option>
						<?php for($i=1;$i<=9;$i++){ 
							$aow = $i*100;
						?>
						<option value="<?php echo $aow; ?>" <?php if(get_option('SSuprydp_action_option_weight')==$aow){ echo 'selected="selected"';} ?>><?php echo $aow; ?></option>
						<?php } ?>
					</select>
					
			    </div>
				<div class="SSuprydp_field_wrap">
                    <label><?php _e("Call to Action Font Size", "sticky-sidebar"); ?></label>
					
					<select name="SSuprydp_action_option_size" class="SSuprydp_input meta_title">
						<option value="">Select Font Size</option>
						<?php for($i=10;$i<=30;$i++){ 
							$aosi= $i.'px';
						?>
						<option value="<?php echo $aosi; ?>" <?php if(get_option('SSuprydp_action_option_size')==$aosi){ echo 'selected="selected"';} ?>><?php echo $aosi; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="SSuprydp_field_wrap">
					<input type="hidden" id="SSuprydp_action_option_color_hidden" value="<?php echo get_option('SSuprydp_action_option_color'); ?>" />
                    <label><?php _e("Call to Action Color", "sticky-sidebar"); ?></label>
					<input type="text" name="SSuprydp_action_option_color" id="SSuprydp_action_option_color" class="SSuprydp_input meta_title" value="<?php _e(get_option('SSuprydp_action_option_color'), "sticky-sidebar"); ?>" placeholder="Select Color">	
				</div>
				<div class="SSuprydp_field_wrap">
                    <button id="SSuprydp_action_option_color_id" class="button" type="button">Color Picker</button>
                </div><!-- end wrap -->
				
				
				<!-- URL Options -->
				<hr>
				<div class="SSuprydp_field_wrap">
					<div class="heading"><?php _e("Call to Action URL Options", "sticky-sidebar"); ?><span data-toggle="image_info4" id="image_info4" title="<img height='400' src='<?php _e(SSuprydp_URL.'/assets/img/sticky-sidebar-cta-instructions.jpg', 'sticky-sidebar'); ?>' />"><i class='fa fa-question-circle'></i>
					</span>
					
					</div>
					<p>Call to action url </p>
					<input id="SSuprydp_action_option_url" name="SSuprydp_action_option_url" type="text" placeholder="Enter Url" value="<?php _e(get_option('SSuprydp_action_option_url'), "sticky-sidebar"); ?>" class="SSuprydp_input meta_title"/>
				</div><!-- end wrap -->
				
				<!-- Target Blank -->
				<div class="SSuprydp_field_wrap">
					<input type="checkbox" name="SSuprydp_target_blank" value="Yes" <?php if(get_option('SSuprydp_target_blank')=='Yes'){ echo 'checked'; }?> class="develop_check" />
					<label class="heading nofollow-label"><?php _e("Target Blank", "sticky-sidebar"); ?></label>
					<p>Opens page or site in a new tab</p>
                    
					<div class="develop_mode">
						<div class="SSuprydp_yes_btn radio_text_style">
							
						</div>
						
					</div>
					
                </div><!-- end wrap -->
				
				<!-- No Follow -->
				<div class="SSuprydp_field_wrap">
					<input type="checkbox" name="SSuprydp_nofollow" value="Yes" <?php if(get_option('SSuprydp_nofollow')=='Yes'){ echo 'checked'; }?> class="develop_check" /> 
					<label class="heading nofollow-label"><?php _e("Nofollow", "sticky-sidebar"); ?></label>
					<p> Tells search engines not to follow the outbound link</p>
                    
					<div class="develop_mode">
						<div class="SSuprydp_yes_btn">
							
						</div>
						
					</div><!-- end wrap -->
					
                </div>
				<!-- 
				<div class="SSuprydp_field_wrap">
					<div class="container">  
					<label><?php /* _e("Select Icons", "sticky-sidebar"); */ ?></label>
					 <input type="hidden" id="SSuprydp_awesome_font" name="SSuprydp_awesome_font" >
					    <p id="SSuprydp_display_font"><i class="<?php /* echo get_option('SSuprydp_awesome_font'); ?>"></i><?php echo get_option('SSuprydp_awesome_font'); */ ?></p>
						<div class="dropdown mt-5">  
							<button type="button" name="btn_first" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">  
								Dropdown button  
							</button>  
							<div class="dropdown-menu SSuprydp_dropdowm_list">  
							<?php /* foreach($listfonts as $listfont){ */ ?>
								<a class="dropdown-item" href="javascript:;"> <i class="<?php /* echo $listfont; */ ?>"></i> <?php /* echo $listfont; */ ?> </a>  
							<?php /* } */ ?>      
							</div>  
						</div>  
					</div>  
				</div>
				-->
			</div><!-- SSuprydp_page_fields -->

        </div>
        <div class="SSuprydp_btn_wrap">

            <input type="submit"  onclick="return SSuprydp_Admin.ProcessPageData(event, this);"  class="button button-primary button-large" name="add_btn_setting" value="<?php _e("Save Setting"); ?>">

        </div>
		
		<div class="SSuprydp_field_wrap"  id="SSuprydp_modal_msg" style="display:none;">

		   <div class="SSuprydp_modal_content" ></div>

		</div>

    </form>
	</div><!-- SSuprydp_col_2 -->
	<div class="SSuprydp_col_2 rightscroll">
		
		<div class="SSuprydp-preview-warning">
			This is a preview to show how the banner will show on the front end of your website. The preview will only update once the settings are saved and the page refreshes.
			<?php 
			$website_off = '';
			$website_on = '';
		if(get_option('SSuprydp_development')=='Yes' || get_option('SSuprydp_development')==''){ 
			$website_off = 'style="display:none;"';
			$website_on = 'style="display:block;"';
		
		} else{
			$website_off = 'style="display:block;"';
			$website_on = 'style="display:none;"';
			
		}?>
			<div class="website_off" <?php echo $website_off; ?>>Easy Sticky Sidebar is displaying on your site</div>
			<div class="website_on" <?php echo $website_on; ?>>Easy Sticky Sidebar is not displaying on your site</div>
		</div>
		
		<?php
		
			$Sticky_Sidebar_image = get_option('sticky-s-media');
			/************Sticky sidebar button options************/
			$SSuprydp_button_option_text = get_option('SSuprydp_button_option_text');
			$SSuprydp_button_option_backg_color = get_option('SSuprydp_button_option_backg_color');
			$SSuprydp_button_option_font = get_option('SSuprydp_button_option_font');
			$SSuprydp_button_option_weight = get_option('SSuprydp_button_option_weight');
			$SSuprydp_button_option_size = get_option('SSuprydp_button_option_size');
			$SSuprydp_button_option_align = get_option('SSuprydp_button_option_align');
			$SSuprydp_button_option_color = get_option('SSuprydp_button_option_color');
			/***************Sticky Sidebar Content Options******************/
			$SSuprydp_content_option_text = get_option('SSuprydp_content_option_text');
			$SSuprydp_content_option_font = get_option('SSuprydp_content_option_font');
			$SSuprydp_content_option_weight = get_option('SSuprydp_content_option_weight');
			$SSuprydp_content_option_size = get_option('SSuprydp_content_option_size');
			$SSuprydp_content_option_color = get_option('SSuprydp_content_option_color');
			/************Sticky Sidebar Divider Options***********/
			$SSuprydp_divider_option_color = get_option('SSuprydp_divider_option_color');
			/**********Sticky Sidebar Call to Action Options**********/
			$SSuprydp_action_option_text = get_option('SSuprydp_action_option_text');
			$SSuprydp_action_option_font = get_option('SSuprydp_action_option_font');
			$SSuprydp_action_option_weight = get_option('SSuprydp_action_option_weight');
			$SSuprydp_action_option_size = get_option('SSuprydp_action_option_size');
			$SSuprydp_action_option_color = get_option('SSuprydp_action_option_color');
			$SSuprydp_action_option_url = get_option('SSuprydp_action_option_url');
			$SSuprydp_awesome_font = get_option('SSuprydp_awesome_font');
			
			$SSuprydp_dis_mobile = get_option('SSuprydp_dis_mobile');
			$SSuprydp_target_blank = get_option('SSuprydp_target_blank');
			$SSuprydp_nofollow = get_option('SSuprydp_nofollow');
			$SSuprydp_shrink='';
			$SSuprydp_shrink_class='';
			$SSuprydp_shrink = get_option('SSuprydp_shrink');
			
			if($SSuprydp_shrink =='Yes'){
				$SSuprydp_shrink_class = 'shrink';
			}else{
				$SSuprydp_shrink_class = '';
			}
			
			$SSuprydp_hideimg='';
			$SSuprydp_hideimg_cls='';
			$SSuprydp_hideimg = get_option('SSuprydp_img_hideimg');
			
			if($SSuprydp_hideimg =='Yes'){
				$SSuprydp_hideimg_cls = 'display:none';
			}else{
				$SSuprydp_hideimg_cls = '';
			}
			$SSuprydp_tb='';
			if($SSuprydp_target_blank =='Yes'){
				$SSuprydp_tb = 'target="_blank"';
			}
			$SSuprydp_nf='';
			if($SSuprydp_nofollow =='Yes'){
				$SSuprydp_nf = 'rel="nofollow"';
			}
			$SSuprydp_dm=' ';
			if($SSuprydp_dis_mobile =='No'){
				$SSuprydp_dm = 'mobile-none';
			}
			
			
			?>
				<div class="sticky-sidebar-wrap <?php echo $SSuprydp_dm.' '.$SSuprydp_shrink_class; ?>">
				<div class="sticky-sidebar-button" style="background-color: <?php print $SSuprydp_button_option_backg_color; ?>;">
			<div style="font-family: <?php print $SSuprydp_button_option_font; ?>; font-weight: <?php print $SSuprydp_button_option_weight; ?>; font-size: <?php print $SSuprydp_button_option_size; ?>; color: <?php print $SSuprydp_button_option_color; ?>; text-align: <?php print $SSuprydp_button_option_align; ?>;"><?php print $SSuprydp_button_option_text; ?>
			 </div>
	     </div>
		 <a href="<?php print $SSuprydp_action_option_url; ?>" <?php if($SSuprydp_target_blank=="Yes"){ echo 'target="_blank"'; }?> <?php if($SSuprydp_nofollow=="Yes"){ echo 'rel="nofollow"'; }?>>	 
			<div class="sticky-sidebar-image" style="background-image: url('<?php print $Sticky_Sidebar_image; ?>'); <?php echo $SSuprydp_hideimg_cls; ?>"></div>
			  <div class="stick-sidebar-container">
				<div class="sticky-sidebar-text" style="font-family: <?php print $SSuprydp_content_option_font; ?>; font-weight: <?php print $SSuprydp_content_option_weight; ?>; font-size: <?php print $SSuprydp_content_option_size; ?>; color: <?php print $SSuprydp_content_option_color; ?>;"><?php print $SSuprydp_content_option_text; ?>
				  </div>
			     <div class="sticky-sidebar-call-to-action" style="font-family: <?php print $SSuprydp_action_option_font; ?>; font-weight: <?php print $SSuprydp_action_option_weight; ?>; font-size: <?php print $SSuprydp_action_option_size; ?>; color: <?php print $SSuprydp_action_option_color; ?>; border-top: solid 2px <?php print $SSuprydp_divider_option_color; ?>"><?php print $SSuprydp_action_option_text; ?><span class="SSuprydp-icon"><i class="fa fa-chevron-right"></i></span></div>
			  </div>
		  </a>
	  </div>
	  
	</div><!-- SSuprydp_col_2 -->
</div>
<?php
$my_saved_attachment_post_id = get_option( 'image_attachment_id', 0 );

	?>
<script type='text/javascript'>

		jQuery( document ).ready( function( $ ) {
			/*$.preventDefault();	*/
			// Uploading files
			var file_frame;
			var wp_media_post_id = (wp.media == undefined) ? null : wp.media.model.settings.post.id;
			var set_to_post_id = '<?php echo $my_saved_attachment_post_id; ?>'; 
			

			jQuery('#upload_image_button').on('click', function( event ){

				event.preventDefault();

				// If the media frame already exists, reopen it.
				if ( file_frame ) {
					// Set the post ID to what we want
					file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
					// Open frame
					file_frame.open();
					return;
				} else {
					// Set the wp.media post id so the uploader grabs the ID we want when initialised
					wp.media.model.settings.post.id = set_to_post_id;
				}

				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					title: 'Select a image to upload',
					button: {
						text: 'Use this image',
					},
					multiple: false	// Set to true to allow multiple files to be selected
				});

				// When an image is selected, run a callback.
				file_frame.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame.state().get('selection').first().toJSON();

					// Do something with attachment.id and/or attachment.url here
					$( '#image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
					$( '#image_attachment_id' ).val( attachment.id );
					$( '#sticky-s-media' ).val( attachment.url );
					

					// Restore the main post ID
					wp.media.model.settings.post.id = wp_media_post_id;
				});

					// Finally, open the modal
					file_frame.open();
			});

			// Restore the main ID when the add media button is pressed
			jQuery( 'a.add_media' ).on( 'click', function() {
				wp.media.model.settings.post.id = wp_media_post_id;
				
			}); 
		});		
</script>