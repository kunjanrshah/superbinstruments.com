<?php

/*
 * StickySidebar Shortcodes
 * @package Sticky-Sidebar/inc
 * @since   1.1.9
 * 
 */

class SSuprydpShortcodes {
    
    /**
     * class constructor
     */
    function __construct() {
		
		/**
         * shortcode to get user profile info
         */
        add_shortcode('SSuprydp', [$this, 'SSuprydpProfile']);
        
    }
    
    /**
     * display Post Username
     * @global type $post
     * @return String
     */
    public function SSuprydpProfile($atts) {
		$current_user = wp_get_current_user();
		if(!$current_user){
			wp_die();
		}
		return;       
		
    }
}

return new SSuprydpShortcodes();
