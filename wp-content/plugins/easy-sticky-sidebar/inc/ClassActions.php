<?php

/*
 * StickySidebar Actions
 * @package wp-dynamic-shortcodes/inc
 * @since   1.1.9
 */

class SSuprydpActions {

    /**
     * StickySidebar Constructor.
     */
    function __construct() {
        foreach ($this->AjaxActions() as $key => $action) {
            add_action("wp_ajax_{$action['name']}", [$this, $action['callback']]);
            add_action("wp_ajax_nopriv_{$action['name']}", [$this, $action['callback']]);
        }
        add_action('init', [$this, 'SSuprydpActionsInit']);
        
    }

    /*
     * SSuprydpStickySidebar ajax handlers 
     * 
     * @return Array
     */

    private function AjaxActions() {
        return [
            ['name' => 'process_pages', 'callback' => 'processPages'],
            ['name' => 'validate_data', 'callback' => 'validateData']
        ];
    }
    
    /**
     * 
     * @global type $wpdb
     * @return JSON
     */
    public function processPages() {
        global $wpdb;
        if(isset($_POST)){
			$postdata = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);;
			
		    if (is_array($postdata)) {
				if(!array_key_exists('SSuprydp_target_blank',$postdata)){
					$postdata['SSuprydp_target_blank']='No';
				}
				if(!array_key_exists('SSuprydp_nofollow',$postdata)){
					$postdata['SSuprydp_nofollow']='No';
				}
				if(!array_key_exists('SSuprydp_shrink',$postdata)){
					$postdata['SSuprydp_shrink']='No';
				}
				if(!array_key_exists('SSuprydp_img_hideimg',$postdata)){
					$postdata['SSuprydp_img_hideimg']='No';
				}
				$postdata['SSuprydp_dis_mobile']='No';
				
				foreach($postdata as $keys=>$value){
					if($value !=''){
						if($keys=='SSuprydp_content_option_text'){
							update_option($keys,strip_tags($value));
						}else{
							update_option($keys,$value);
						}
								
					}				
				}
				$url = admin_url('admin.php?page=sticky-sidebar&SSuprydp_msg=success');
				wp_redirect( $url,301,'submitted' );
				exit;
				
			} else {
			   $url = admin_url('admin.php?page=sticky-sidebar&SSuprydp_msg=failed');
				wp_redirect( $url,301,'failed' );
				exit;
			}

			return;	
		}
        
    }

    /**
     * actions init method
     */
    public function SSuprydpActionsInit() {
        
    }
	/**
     * validate data
     * @param array $postdata
     * @return array
     */
    public function validateData() {
		
		$postdata = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
       
        $return = ['errors' => null, 'where' => null];
        $button_text = SSuprydpStickySidebar()->engine->getValue('SSuprydp_button_option_text', $postdata, false);
        if (!$button_text) {
			$return['page_name'] = __("Please enter button text");
			wp_send_json(['status' => 'failed', 'errors' => $return]);
        }
        else{
			$response['status'] = 'success';
            $response['content'] = 'Fields are added successfully.';
            wp_send_json($response);
		}      
    }
	
}

return new SSuprydpActions();
