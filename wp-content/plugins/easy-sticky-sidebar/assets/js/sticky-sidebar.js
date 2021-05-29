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