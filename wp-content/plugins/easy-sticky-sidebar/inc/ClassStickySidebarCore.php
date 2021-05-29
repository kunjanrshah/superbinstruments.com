<?php

/*
 * StickySidebar Core funtions
 * @package wp-dynamic-shortcodes/inc
 * @since   1.1.9
 */

class SSuprydpStickySidebarCore {

    private $post_type = 'SSuprydp-template';
    
    public $Shortcodes = ['[SSuprydp userinfo="username"]'];
    /**
     * class constructor 
     */
    function __construct() {
        add_action('admin_menu', array($this, 'addSubmenuPages'));
        // Add meta box goes into our admin_init function
        
        add_action( 'add_meta_boxes', [$this, 'SSuprydp_register_meta_boxes'] );
        /* save meta boxes */
        
        add_action('save_post', [$this, 'SSuprydpSaveMetaBoxes']);
    }

    /**
     * get the content from view file
     * @param String $viewname view file name
     * @param Array $data Data to send into view file
     * @throws ApiException on a non 2xx response
     * @return HTML
     */
    public function getView($viewname, array $data = []) {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }
        /* default variables in view */
        global $SSuprydpSetting;

        ob_start();
        $viewpath = get_stylesheet_directory() . "/sticky-sidebar/{$viewname}.php";
        if (!file_exists($viewpath)) {
            $viewpath = SSuprydp_ABSPATH . "views/{$viewname}.php";
        }
        require($viewpath);
        $html = ob_get_clean();
        return $html;
    }
    
    /**
     * get value from array/object if set
     * 
     * @param String $key
     * @param Mixed $Data
     * 
     * return Mixed
     */
    public function getValue($key, $Data, $print = true) {
        if (is_array($Data)) {
            if (array_key_exists($key, $Data)) {
                if ($print) {
                    echo $Data[$key];
                } else {
                    return $Data[$key];
                }
            }
        }

        if (isset($Data->$key)) {
            if ($print) {
                echo $Data->$key;
            } else {
                return $Data->$key;
            }
        }

        return false;
    }
    
    /**
     * register post type wpbyn_templates
     */
    public function registerTemplates() {
				               
    }
	
	
    /**
     * register meta box
     */
    public function SSuprydp_register_meta_boxes() {
        add_meta_box('SSuprydp_shortcode_info', __('Sticky Sidebar'),  [$this, 'sticky_sidebar_info'], $this->post_type, 'side', 'high');
    }
    
    /**
     * display shortcodes infor in the templates
     * @param mixed $post
     */
    public function sticky_sidebar_info($post) {
        echo wp_sprintf("<p>%s</p>", __("you can use following sticky sidebar in templates", 'sticky-sidebar'));
        foreach ($this->Shortcodes as $key => $shortcode) {
            echo wp_sprintf('<strong class="SSuprydp_shortcode">%s</strong>', $shortcode);
        }
    }
    
     
    /**
     * add submenu pages in admin menu
     */
    public function addSubmenuPages() {
        add_menu_page('Sticky CTA', 'Sticky CTA', 'manage_options', 'sticky-sidebar', [$this, 'SSuprydp_AddFormSetting'] );		
		
    }
    /**
     * add bulk pages
     */
    public function SSuprydp_AddFormSetting() {
		$data['listfonts'] = $this->SSuprydp_awesomeFonts();
        print $this->getView('add_pages',$data);
    }
	/**
	
	add database entry
	**/
	public function addTables() {

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		$this->SSuprydp_cmedia();
		
        $this->optionKeys();

    }
	public function optionKeys(){
		global $wpdb;
		$SSuprydp_dtime= date("Y-m-d H:i:s");
		$currentpath = wp_get_upload_dir();
		
		$img_path = $currentpath['url'].'/ss_dummy.jpg'; 
		$sql_post = "INSERT INTO `{$wpdb->prefix}posts` (post_date, post_author, post_title, post_status, comment_status, ping_status, post_name, post_parent, guid, post_type, post_mime_type) VALUES('$SSuprydp_dtime',1, 'Sticky Sidebar', 'inherit', 'open', 'open', 'Sticky Sidebar', 0, '$img_path', 'attachment', 'image/jpeg')";
		
		$wpdb->query($sql_post);
		
		$attac_lastid = $wpdb->insert_id;
		
		$SSuprydp_wp_attachment_metadata = $this->SSuprydp_mediameta();
		$SSuprydp_wp_attached_file= date('Y').'/'.date('m').'/ss_dummy.jpg';
		
		$sql_postmeta1 = "INSERT INTO `{$wpdb->prefix}postmeta` (post_id, meta_key, meta_value) VALUES($attac_lastid,'_wp_attached_file', '$SSuprydp_wp_attached_file')";
		
		$wpdb->query($sql_postmeta1);
		
		$sql_postmeta2 = "INSERT INTO `{$wpdb->prefix}postmeta` (post_id, meta_key, meta_value) VALUES($attac_lastid,'_wp_attachment_metadata', '$SSuprydp_wp_attachment_metadata')";
		
		$wpdb->query($sql_postmeta2);
		
		$fields = array(
						"SSuprydp_development"=>"development",
						"sticky-s-media"=>$img_path,
						"SSuprydp_button_option_text"=>"Click Here",
						"SSuprydp_button_option_backg_color"=>"#f9423a",
						"SSuprydp_button_option_font"=>"Open Sans",
						"SSuprydp_button_option_weight"=>"400",
						"SSuprydp_button_option_size"=>"20px",
						"SSuprydp_button_option_color"=>"#ffffff",
						"SSuprydp_content_option_text"=>"This is the Content Area. Put a description here of what you want to promote.",
						"SSuprydp_content_option_font"=>"Open Sans",
						"SSuprydp_content_option_weight"=>"800",
						"SSuprydp_content_option_size"=>"25px",
						"SSuprydp_content_option_color"=>"#250e62",
						"SSuprydp_divider_option_color"=>"#1b7ccc",
						"SSuprydp_action_option_text"=>"Click Here to View",
						"SSuprydp_action_option_font"=>"Open Sans",
						"SSuprydp_action_option_weight"=>"500",
						"SSuprydp_action_option_size"=>"19px",
						"SSuprydp_action_option_color"=>"#000000",
						"SSuprydp_action_option_url"=>"https://www.google.com/",
						"SSuprydp_awesome_font"=>"fa fa-arrows",
						"SSuprydp_button_option_align"=>"top",
						"SSuprydp_dis_mobile"=>'No',
						"SSuprydp_location"=>'',
						"image_attachment_id"=>$attac_lastid
						);
		foreach($fields as $keys=>$field){
			update_option($keys,$field);
		}				    

        return true;
	}
	public function SSuprydp_awesomeFonts(){
		$listfont = 'fa fa-address-book ,fa fa-address-book-o ,fa fa-address-card ,fa fa-address-card-o ,fa fa-adjust ,fa fa-american-sign-language-interpreting ,fa fa-anchor ,fa fa-archive ,fa fa-area-chart ,fa fa-arrows ,fa fa-arrows-h ,fa fa-arrows-v ,fa fa-asl-interpreting ,fa fa-assistive-listening-systems ,fa fa-asterisk ,fa fa-at ,fa fa-automobile ,fa fa-audio-description ,fa fa-balance-scale ,fa fa-ban ,fa fa-bank ,fa fa-bar-chart ,fa fa-bar-chart-o ,fa fa-barcode ,fa fa-bars ,fa fa-bath ,fa fa-bathtub ,fa fa-battery-0 ,fa fa-battery-1 ,fa fa-battery-2 ,fa fa-battery-3 ,fa fa-battery-4 ,fa fa-battery-empty ,fa fa-battery-full ,fa fa-battery-half ,fa fa-battery-quarter ,fa fa-battery-three-quarters ,fa fa-bed ,fa fa-beer ,fa fa-bell ,fa fa-bell-o ,fa fa-bell-slash ,fa fa-bell-slash-o ,fa fa-bicycle ,fa fa-binoculars ,fa fa-birthday-cake ,fa fa-blind ,fa fa-bolt ,fa fa-bomb ,fa fa-book ,fa fa-bookmark ,fa fa-bookmark-o ,fa fa-braille ,fa fa-briefcase ,fa fa-bug ,fa fa-building ,fa fa-building-o ,fa fa-bullhorn ,fa fa-bullseye ,fa fa-bus ,fa fa-cab ,fa fa-calculator ,fa fa-calendar ,fa fa-calendar-o ,fa fa-calendar-check-o ,fa fa-calendar-minus-o ,fa fa-calendar-plus-o ,fa fa-calendar-times-o ,fa fa-camera ,fa fa-camera-retro ,fa fa-car ,fa fa-caret-square-o-down ,fa fa-caret-square-o-left ,fa fa-caret-square-o-right ,fa fa-caret-square-o-up ,fa fa-cart-arrow-down ,fa fa-cart-plus ,fa fa-cc ,fa fa-certificate ,fa fa-check ,fa fa-check-circle ,fa fa-check-circle-o ,fa fa-check-square ,fa fa-check-square-o ,fa fa-child ,fa fa-circle ,fa fa-circle-o ,fa fa-circle-o-notch ,fa fa-circle-thin ,fa fa-clock-o ,fa fa-clone ,fa fa-close ,fa fa-cloud ,fa fa-cloud-download ,fa fa-cloud-upload ,fa fa-code ,fa fa-code-fork ,fa fa-coffee ,fa fa-cog ,fa fa-cogs ,fa fa-comment ,fa fa-comment-o ,fa fa-comments ,fa fa-comments-o ,fa fa-commenting ,fa fa-commenting-o ,fa fa-compass ,fa fa-copyright ,fa fa-credit-card ,fa fa-credit-card-alt ,fa fa-creative-commons ,fa fa-crop ,fa fa-crosshairs ,fa fa-cube ,fa fa-cubes ,fa fa-cutlery ,fa fa-dashboard ,fa fa-database ,fa fa-deaf ,fa fa-deafness ,fa fa-desktop ,fa fa-diamond ,fa fa-dot-circle-o ,fa fa-download ,fa fa-drivers-license ,fa fa-drivers-license-o ,fa fa-edit ,fa fa-ellipsis-h ,fa fa-ellipsis-v ,fa fa-envelope ,fa fa-envelope-o ,fa fa-envelope-open ,fa fa-envelope-open-o ,fa fa-envelope-square ,fa fa-eraser ,fa fa-exchange ,fa fa-exclamation ,fa fa-exclamation-circle ,fa fa-exclamation-triangle ,fa fa-external-link ,fa fa-external-link-square ,fa fa-eye ,fa fa-eye-slash ,fa fa-eyedropper ,fa fa-fax ,fa fa-female ,fa fa-fighter-jet ,fa fa-file-archive-o ,fa fa-file-audio-o ,fa fa-file-code-o ,fa fa-file-excel-o ,fa fa-file-image-o ,fa fa-file-movie-o ,fa fa-file-pdf-o ,fa fa-file-photo-o ,fa fa-file-picture-o ,fa fa-file-powerpoint-o ,fa fa-file-sound-o ,fa fa-file-video-o ,fa fa-file-word-o ,fa fa-file-zip-o ,fa fa-film ,fa fa-filter ,fa fa-fire ,fa fa-fire-extinguisher ,fa fa-flag ,fa fa-flag-checkered ,fa fa-flag-o ,fa fa-flash ,fa fa-flask ,fa fa-folder ,fa fa-folder-o ,fa fa-folder-open ,fa fa-folder-open-o ,fa fa-frown-o ,fa fa-futbol-o ,fa fa-gamepad ,fa fa-gavel ,fa fa-gear ,fa fa-gears ,fa fa-genderless ,fa fa-gift ,fa fa-glass ,fa fa-globe ,fa fa-graduation-cap ,fa fa-group ,fa fa-hard-of-hearing ,fa fa-hdd-o ,fa fa-handshake-o ,fa fa-hashtag ,fa fa-headphones ,fa fa-heart ,fa fa-heart-o ,fa fa-heartbeat ,fa fa-history ,fa fa-home ,fa fa-hotel ,fa fa-hourglass ,fa fa-hourglass-1 ,fa fa-hourglass-2 ,fa fa-hourglass-3 ,fa fa-hourglass-end ,fa fa-hourglass-half ,fa fa-hourglass-o ,fa fa-hourglass-start ,fa fa-i-cursor ,fa fa-id-badge ,fa fa-id-card ,fa fa-id-card-o ,fa fa-image ,fa fa-inbox ,fa fa-industry ,fa fa-info ,fa fa-info-circle ,fa fa-institution ,fa fa-key ,fa fa-keyboard-o ,fa fa-language ,fa fa-laptop ,fa fa-leaf ,fa fa-legal ,fa fa-lemon-o ,fa fa-level-down ,fa fa-level-up ,fa fa-life-bouy ,fa fa-life-buoy ,fa fa-life-ring ,fa fa-life-saver ,fa fa-lightbulb-o ,fa fa-line-chart ,fa fa-location-arrow ,fa fa-lock ,fa fa-low-vision ,fa fa-magic ,fa fa-magnet ,fa fa-mail-forward ,fa fa-mail-reply ,fa fa-mail-reply-all ,fa fa-male ,fa fa-map ,fa fa-map-o ,fa fa-map-pin ,fa fa-map-signs ,fa fa-map-marker ,fa fa-meh-o ,fa fa-microchip ,fa fa-microphone ,fa fa-microphone-slash ,fa fa-minus ,fa fa-minus-circle ,fa fa-minus-square ,fa fa-minus-square-o ,fa fa-mobile ,fa fa-mobile-phone ,fa fa-money ,fa fa-moon-o ,fa fa-mortar-board ,fa fa-motorcycle ,fa fa-mouse-pointer ,fa fa-music ,fa fa-navicon ,fa fa-newspaper-o ,fa fa-object-group ,fa fa-object-ungroup ,fa fa-paint-brush ,fa fa-paper-plane ,fa fa-paper-plane-o ,fa fa-paw ,fa fa-pencil ,fa fa-pencil-square ,fa fa-pencil-square-o ,fa fa-percent ,fa fa-phone ,fa fa-phone-square ,fa fa-photo ,fa fa-picture-o ,fa fa-pie-chart ,fa fa-plane ,fa fa-plug ,fa fa-plus ,fa fa-plus-circle ,fa fa-plus-square ,fa fa-plus-square-o ,fa fa-podcast ,fa fa-power-off ,fa fa-print ,fa fa-puzzle-piece ,fa fa-qrcode ,fa fa-question ,fa fa-question-circle ,fa fa-question-circle-o ,fa fa-quote-left ,fa fa-quote-right ,fa fa-random ,fa fa-recycle ,fa fa-refresh ,fa fa-registered ,fa fa-remove ,fa fa-reorder ,fa fa-reply ,fa fa-reply-all ,fa fa-retweet ,fa fa-road ,fa fa-rocket ,fa fa-rss ,fa fa-rss-square ,fa fa-s15 ,fa fa-search ,fa fa-search-minus ,fa fa-search-plus ,fa fa-send ,fa fa-send-o ,fa fa-server ,fa fa-share ,fa fa-share-alt ,fa fa-share-alt-square ,fa fa-share-square ,fa fa-share-square-o ,fa fa-shield ,fa fa-ship ,fa fa-shopping-bag ,fa fa-shopping-basket ,fa fa-shopping-cart ,fa fa-shower ,fa fa-sign-in ,fa fa-sign-out ,fa fa-sign-language ,fa fa-signal ,fa fa-signing ,fa fa-sitemap ,fa fa-sliders ,fa fa-smile-o ,fa fa-snowflake-o ,fa fa-soccer-ball-o ,fa fa-sort ,fa fa-sort-alpha-asc ,fa fa-sort-alpha-desc ,fa fa-sort-amount-asc ,fa fa-sort-amount-desc ,fa fa-sort-asc ,fa fa-sort-desc ,fa fa-sort-down ,fa fa-sort-numeric-asc ,fa fa-sort-numeric-desc ,fa fa-sort-up ,fa fa-space-shuttle ,fa fa-spinner ,fa fa-spoon ,fa fa-square ,fa fa-square-o ,fa fa-star ,fa fa-star-half ,fa fa-star-half-empty ,fa fa-star-half-full ,fa fa-star-half-o ,fa fa-star-o ,fa fa-sticky-note ,fa fa-sticky-note-o ,fa fa-street-view ,fa fa-suitcase ,fa fa-sun-o ,fa fa-support ,fa fa-tablet ,fa fa-tachometer ,fa fa-tag ,fa fa-tags ,fa fa-tasks ,fa fa-taxi ,fa fa-television ,fa fa-terminal ,fa fa-thermometer ,fa fa-thermometer-0 ,fa fa-thermometer-1 ,fa fa-thermometer-2 ,fa fa-thermometer-3 ,fa fa-thermometer-4 ,fa fa-thermometer-empty ,fa fa-thermometer-full ,fa fa-thermometer-half ,fa fa-thermometer-quarter ,fa fa-thermometer-three-quarters ,fa fa-thumb-tack ,fa fa-thumbs-down ,fa fa-thumbs-o-up ,fa fa-thumbs-up ,fa fa-ticket ,fa fa-times ,fa fa-times-circle ,fa fa-times-circle-o ,fa fa-times-rectangle ,fa fa-times-rectangle-o ,fa fa-tint ,fa fa-toggle-down ,fa fa-toggle-left ,fa fa-toggle-right ,fa fa-toggle-up ,fa fa-toggle-off ,fa fa-toggle-on ,fa fa-trademark ,fa fa-trash ,fa fa-trash-o ,fa fa-tree ,fa fa-trophy ,fa fa-truck ,fa fa-tty ,fa fa-tv ,fa fa-umbrella ,fa fa-universal-access ,fa fa-university ,fa fa-unlock ,fa fa-unlock-alt ,fa fa-unsorted ,fa fa-upload ,fa fa-user ,fa fa-user-circle ,fa fa-user-circle-o ,fa fa-user-o ,fa fa-user-plus ,fa fa-user-secret ,fa fa-user-times ,fa fa-users ,fa fa-vcard ,fa fa-vcard-o ,fa fa-video-camera ,fa fa-volume-control-phone ,fa fa-volume-down ,fa fa-volume-off ,fa fa-volume-up ,fa fa-warning ,fa fa-wheelchair ,fa fa-wheelchair-alt ,fa fa-window-close ,fa fa-window-close-o ,fa fa-window-maximize ,fa fa-window-minimize ,fa fa-window-restore ,fa fa-wifi ,fa fa-wrench ,fa fa-chevron-right ,fa fa-chevron-left ,fa fa-chevron-circle-down ,fa fa-chevron-circle-up ,fa fa-chevron-circle-right ,fa fa-chevron-circle-left, fa fa-chevron-down ,fa fa-chevron-up';


	    return explode(",",$listfont);
	}
	public function SSuprydp_mediameta(){
		$ar =array();
		$ar['width']=1344;
		$ar['height']=751;
		$ar['file']= '2020/05/ss_dummy.jpg';
		$ar['sizes']= array(
							"medium"=>array(
											"file"=>'ss_dummy-300x167.jpg',
											"width"=>300,
											"height"=>167,
											"mime-type"=>'image/jpeg'
											),
							"large"=>array(
											"file"=>'ss_dummy-1024x572.jpg',
											"width"=>1024,
											"height"=>572,
											"mime-type"=>'image/jpeg'
											),
							
							"thumbnail"=>array(
											"file"=>'ss_dummy-150x83.jpg',
											"width"=>150,
											"height"=>83,
											"mime-type"=>'image/jpeg'									
											),
							
							"medium_large"=>array(
											"file"=>'ss_dummy-768x429.jpg',
											"width"=>768,
											"height"=>429,
											"mime-type"=>'image/jpeg'									
											),
							"1536x1536"=>array(
											"file"=>'ss_dummy-1536x858.jpg',
											"width"=>1536,
											"height"=>858,
											"mime-type"=>'image/jpeg'									
											),
							"post-thumbnail"=>array(
											"file"=>'ss_dummy-1200x670.jpg',
											"width"=>1200,
											"height"=>670,
											"mime-type"=>'image/jpeg'									
											)				
							);
		$ar['image_meta']= array(
								"aperture"=>0,
								"credit"=>'',
								"camera"=>'',
								"caption"=>'',
								"created_timestamp"=>0,
								"copyright"=>'',
								"focal_length"=>0,
								"iso"=>0,
								"shutter_speed"=>0,
								"title"=>'',
								"keywords"=>array(),
								);

		return serialize($ar);
	}
	public function SSuprydp_cmedia(){
		$currentpath = wp_get_upload_dir();
		
		if($currentpath['path']){
			$sourcepath = SSuprydp_ABSPATH.'/assets/img/ss_dummy.jpg';
			$destinationpath = $currentpath['path'].'/ss_dummy.jpg';
			@copy($sourcepath,$destinationpath);
			
			$sourcepath300 = SSuprydp_ABSPATH.'/assets/img/ss_dummy-300x167.jpg';
			$destinationpath300 = $currentpath['path'].'/ss_dummy-300x167.jpg';
			@copy($sourcepath300,$destinationpath300);
			
			$sourcepath1024 = SSuprydp_ABSPATH.'/assets/img/ss_dummy-1024x572.jpg';
			$destinationpath1024 = $currentpath['path'].'/ss_dummy-1024x572.jpg';
			@copy($sourcepath1024,$destinationpath1024);
			
			$sourcepath150 = SSuprydp_ABSPATH.'/assets/img/ss_dummy-150x83.jpg';
			$destinationpath150 = $currentpath['path'].'/ss_dummy-150x83.jpg';
			@copy($sourcepath150,$destinationpath150);
			
			$sourcepath768 = SSuprydp_ABSPATH.'/assets/img/ss_dummy-768x429.jpg';
			$destinationpath768 = $currentpath['path'].'/ss_dummy-768x429.jpg';
			@copy($sourcepath768,$destinationpath768);
			
			$sourcepath1536 = SSuprydp_ABSPATH.'/assets/img/ss_dummy-1536x858.jpg';
			$destinationpath1536 = $currentpath['path'].'/ss_dummy-1536x858.jpg';
			@copy($sourcepath1536,$destinationpath1536);
			
			$sourcepath1200 = SSuprydp_ABSPATH.'/assets/img/ss_dummy-1200x670.jpg';
			$destinationpath1200 = $currentpath['path'].'/ss_dummy-1200x670.jpg';
			@copy($sourcepath1200,$destinationpath1200);
		}
	}
	public function SSuprydpMobilededect(){
		$useragent=$_SERVER['HTTP_USER_AGENT'];

		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
			return "Yes";
		}else{
			return "No";
		}

	}
	public function SSuprydpSaveMetaBoxes(){
		return '';
	}
}
