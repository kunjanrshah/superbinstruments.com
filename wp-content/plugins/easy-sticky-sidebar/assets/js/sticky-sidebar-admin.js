/*
 * 
 * neon maker backend end Javascript
 * 
 * @since 1.0.0
 * 
 */

jQuery(document).ready(function( $ ) {
	
	height = $('.sticky-sidebar-button').height();
	$('.sticky-sidebar-button div').css('width', height);
	
});

var SSuprydp_Admin;
(function ($) {
    var $this, $total_results, $offset, $limit, $processed;
    SSuprydp_Admin = {
        settings: {
            
        },
        initilaize: function () {
            $this = SSuprydp_Admin;
            $(document).ready(function () {
                $offset = $processed = 0;
                $limit = 10;
                $this.onInitMethods();
            });			
        },
        onInitMethods: function () {
        },
        ProcessPageData: function(event, elem) {
            event.preventDefault();
            $(".upb_error").remove();
			
            $(elem).find('input[type="submit"]').attr('disabled', true);
            $this.postFormData(ajaxurl+"?action=validate_data", "#SSuprydp_form", function(response) {
				if(response.status == 'success') {					
                    jQuery("#SSuprydp_form").submit();
					return false;
                }else {
					$('#SSuprydp_modal_msg').show();
					$('#SSuprydp_modal_msg .SSuprydp_modal_content').html("Button text is required!");
					$.each( response.errors, function( key, value ) {
						$('#SSuprydp_modal_msg .SSuprydp_modal_content').text(value);
                    });
				}
                
            });
        },
        displayModal: function (response, sizeClass) {
            if (!sizeClass) {
                sizeClass = 'modal-normal';
            }
            if (response.header) {
                $('#SSuprydp_modal .SSuprydp_modal_heading').html(response.header).show();
            } else {
                $('#SSuprydp_modal .SSuprydp_modal_heading').hide();
            }
            if (response.content) {
				$('#SSuprydp_modal_msg').show();
                $('#SSuprydp_modal_msg .SSuprydp_modal_content').html(response.content);
            }else {
                $('#SSuprydp_modal_msg').hide();
            }
            if (response.footer) {
                $('#SSuprydp_modal .SSuprydp_modal_footer').html(response.footer).show();
            } else {
                $('#SSuprydp_modal .SSuprydp_modal_footer').hide();
            }
            $('#SSuprydp_modal').removeAttr('class').addClass("upb_overlay " + sizeClass).show();
        },
        postFormData: function (url, form, callback) {
            var formData = new FormData($(form)[0]);
            $.ajax({
                url: url, // server url
                type: 'POST', //POST or GET 
                data: formData, // data to send in ajax format or querystring format
                datatype: 'json',
                beforeSend: function (xhr) {
                    
                },
                success: function (data) {
                    callback(data); // return data in callback
                },

                complete: function () {
                    
                },

                error: function (xhr, status, error) {

                },
                cache: false,
                contentType: false,
                processData: false

            });
        }		
    };
    SSuprydp_Admin.initilaize();
})(jQuery);


jQuery(function() {
	/**************button background color****************************/
	var SSuprydp_button_option_backg_color = jQuery("#SSuprydp_button_option_backg_color_hidden").val();

	jQuery('#SSuprydp_button_option_backg_color_id').loads({
		flat: false,
		enableAlpha: false,
		layout: 'rgbhex',
		compactLayout: true,
		color: SSuprydp_button_option_backg_color,
		onLoaded: function(ev) {
		  var hex = jQuery(ev.el).getColor("hex", true);
		  jQuery('#SSuprydp_button_option_backg_color').val('#' + hex);
		},
		onHide: function(ev) {
		  var hex = jQuery(ev.el).getColor("hex", true);
		  jQuery('#SSuprydp_button_option_backg_color').val('#' + hex);
		},
		onChange: function(ev) {
		  jQuery('#SSuprydp_button_option_backg_color').val('#' + ev.hex);
		},
		onSubmit: function(ev) {
		  jQuery(ev.el).hides();
		}
	});
	/***********button text color***********/
	var SSuprydp_button_option_color = jQuery("#SSuprydp_button_option_color_hidden").val();

	jQuery('#SSuprydp_button_option_color_id').loads({
		flat: false,
		enableAlpha: false,
		layout: 'rgbhex',
		compactLayout: true,
		color: SSuprydp_button_option_color,
		onLoaded: function(ev) {
		  var hex = jQuery(ev.el).getColor("hex", true);
		  jQuery('#SSuprydp_button_option_color').val('#' + hex);
		},
		onHide: function(ev) {
		  var hex = jQuery(ev.el).getColor("hex", true);
		  jQuery('#SSuprydp_button_option_color').val('#' + hex);
		},
		onChange: function(ev) {
		  jQuery('#SSuprydp_button_option_color').val('#' + ev.hex);
		},
		onSubmit: function(ev) {
		  jQuery(ev.el).hides();
		}
	});
	/**************side content color****************************/
	var SSuprydp_content_option_color = jQuery("#SSuprydp_content_option_color_hidden").val();

	jQuery('#SSuprydp_content_option_color_id').loads({
		flat: false,
		enableAlpha: false,
		layout: 'rgbhex',
		compactLayout: true,
		color: SSuprydp_content_option_color,
		onLoaded: function(ev) {
		  var hex = jQuery(ev.el).getColor("hex", true);
		  jQuery('#SSuprydp_content_option_color').val('#' + hex);
		},
		onHide: function(ev) {
		  var hex = jQuery(ev.el).getColor("hex", true);
		  jQuery('#SSuprydp_content_option_color').val('#' + hex);
		},
		onChange: function(ev) {
		  jQuery('#SSuprydp_content_option_color').val('#' + ev.hex);
		},
		onSubmit: function(ev) {
		  jQuery(ev.el).hides();
		}
	});
	/*************Divider option color***************************/
	var SSuprydp_divider_option_color = jQuery("#SSuprydp_divider_option_color_hidden").val();

	jQuery('#SSuprydp_divider_option_color_id').loads({
		flat: false,
		enableAlpha: false,
		layout: 'rgbhex',
		compactLayout: true,
		color: SSuprydp_divider_option_color,
		onLoaded: function(ev) {
		  var hex = jQuery(ev.el).getColor("hex", true);
		  jQuery('#SSuprydp_divider_option_color').val('#' + hex);
		},
		onHide: function(ev) {
		  var hex = jQuery(ev.el).getColor("hex", true);
		  jQuery('#SSuprydp_divider_option_color').val('#' + hex);
		},
		onChange: function(ev) {
		  jQuery('#SSuprydp_divider_option_color').val('#' + ev.hex);
		},
		onSubmit: function(ev) {
		  jQuery(ev.el).hides();
		}
	});
	/*************call to action color***************************/
	var SSuprydp_action_option_color = jQuery("#SSuprydp_action_option_color_hidden").val();

	jQuery('#SSuprydp_action_option_color_id').loads({
		flat: false,
		enableAlpha: false,
		layout: 'rgbhex',
		compactLayout: true,
		color: SSuprydp_action_option_color,
		onLoaded: function(ev) {
		  var hex = jQuery(ev.el).getColor("hex", true);
		  jQuery('#SSuprydp_action_option_color').val('#' + hex);
		},
		onHide: function(ev) {
		  var hex = jQuery(ev.el).getColor("hex", true);
		  jQuery('#SSuprydp_action_option_color').val('#' + hex);
		},
		onChange: function(ev) {
		  jQuery('#SSuprydp_action_option_color').val('#' + ev.hex);
		},
		onSubmit: function(ev) {
		  jQuery(ev.el).hides();
		}
	});
	
});
jQuery(function(){
        jQuery('#SSuprydp_button_option_font').fontselect();
        jQuery('#SSuprydp_content_option_font').fontselect();
        jQuery('#SSuprydp_action_option_font').fontselect();
      });

jQuery(document).on('click', '.SSuprydp_dropdowm_list a', function() {
		var getfont = jQuery(this).find('i').attr('class');
		jQuery('#SSuprydp_awesome_font').val(getfont);
		
		jQuery("#SSuprydp_display_font").html('<i class="'+getfont+'"></i> '+getfont);
		
	}); 

jQuery(document).ready(function(){
	jQuery("input[name='SSuprydp_development']").on('click',function(){
		if(jQuery(this).val() == 'No'){
			jQuery('.website_off').css('display','block');
			jQuery('.website_on').css('display','none');
		}else{
			jQuery('.website_on').css('display','block');
			jQuery('.website_off').css('display','none');
		}
	});
});	

jQuery(document).ready(function( $ ) {

	var width = $(window).width();

		 if(width >= 767){
          $(window).scroll(function() {
              var scroll = $(window).scrollTop();
              if(scroll > 120 && !$('.sticky-sidebar-wrap').hasClass('scrolled') ){
                  $('.sticky-sidebar-wrap').addClass('shrink');	
				  $('.sticky-sidebar-wrap').addClass('scrolled');
              }
          });
        } 
        
		$('.sticky-sidebar-wrap .sticky-sidebar-button').on('click', function(){
			$('.sticky-sidebar-wrap').toggleClass('shrink');
	    });
	
	height = $('.sticky-sidebar-button').height();
	$('.sticky-sidebar-button div').css('width', height);
	    
});

jQuery(document).ready(function(){
    jQuery('[data-toggle="image_info"]').tooltip({
		animated: 'fade',
		placement: 'bottom',
		html: true
	});   
	jQuery('[data-toggle="image_info1"]').tooltip({
		animated: 'fade',
		placement: 'bottom',
		html: true
	});
	jQuery('[data-toggle="image_info2"]').tooltip({
		animated: 'fade',
		placement: 'bottom',
		html: true
	});
	jQuery('[data-toggle="image_info3"]').tooltip({
		animated: 'fade',
		placement: 'bottom',
		html: true
	});
	jQuery('[data-toggle="image_info4"]').tooltip({
		animated: 'fade',
		placement: 'bottom',
		html: true
	});
	
	jQuery('input[name="SSuprydp_img_hideimg"]').on('click',function(){
		if(jQuery(this).is(":checked")){
			jQuery('.banner_img').hide();
		}else{
			jQuery('.banner_img').show();
		}
	});
});