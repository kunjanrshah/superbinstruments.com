<?php

/*
 * StickySidebar Main class
 * @package sticky-sidebar/inc
 * @since   1.1.9
 */

class SSuprydpStickySidebar {

    /**
     * StickySidebar version.
     *
     * @var string
     */
    public $version = '1.1.9';

    /**
     * The single instance of the class.
     *
     * @var StickySidebar
     * @since 1.1.9
     */
    protected static $_instance = null;

    /**
     * StickySidebar core functions
     *
     * @var engine
     * @since 1.1.9
     */
    public $engine;

    /**
     * Main StickySidebar Instance.
     *
     * Ensures only one instance of IsLayouts is loaded or can be loaded.
     *
     * @since 1.1.9
     * @static
     * @return StickySidebar.
     */
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * StickySidebar Constructor.
     *
     * @global Array StickySidebar
     *
     */
    function __construct() {
        global $SSuprydpSetting;

       $SSuprydpSetting = get_option('SSuprydp_options', true);
       $this->define_constants();
       $this->includes();
       $this->init_hooks();
       $this->engine = new SSuprydpStickySidebarCore();
        
    }

    /**
     * Hook into actions and filters.
     *
     * @since 1.1.9
     */
    private function init_hooks() {
		
        register_activation_hook(SSuprydp_PLUGIN_FILE, array($this, 'SSuprydp_plugin_install'));
		
		add_action('init', array($this, 'init'), 0);

        /* register front end scripts */
        add_action('wp_enqueue_scripts', array($this, 'SSuprydpScripts'), 0);

        /* register admin scripts */
        add_action('admin_enqueue_scripts', array($this, 'SSuprydpAdminScripts'), 0);

        add_action('admin_footer', [$this, 'AddModal']);
   

        add_action('widgets_init', [$this, 'hstngr_register_widget']);
		
		//do_action( 'fl_footer_col1_open' );
		
		add_action( 'wp_footer', [$this, 'stick_sidebar_content']);
		
		
	}
	
	/**
	 sticky sidebar hook run add installation
	**/
	public function SSuprydp_plugin_install() {
        $this->engine->addTables();
    }
    
    /**
     * Define StickySidebar Constants.
     */
    private function define_constants() {
        $this->define('SSuprydp_ABSPATH', dirname(SSuprydp_PLUGIN_FILE) . '/');
        $this->define('SSuprydp_BASENAME', plugin_basename(SSuprydp_PLUGIN_FILE));
        $this->define('SSuprydp_URL', plugins_url(basename(SSuprydp_ABSPATH)));
        $this->define('SSuprydp_VERSION', $this->version);
        $this->define('SSuprydp_ROLE', 'km_user');
    }

    /**
     * Include required core files used in admin and on the frontend.
     */
    public function includes() {
        
		include_once SSuprydp_ABSPATH . '/inc/ClassStickySidebarCore.php';

        include_once SSuprydp_ABSPATH . '/inc/ClassShortcodes.php';
		
        include_once SSuprydp_ABSPATH . '/inc/ClassActions.php';
        
        if (is_admin()) {
            include_once SSuprydp_ABSPATH . '/inc/ClassAdminOptions.php';
        }
    }
	 /**
     * Define constant if not already set.
     *
     * @param string      $name  Constant name.
     * @param string|bool $value Constant value.
     */
	 
	 
    private function define($name, $value) {
        if (!defined($name)) {
            define($name, $value);
        }
    }
	/**
     * Init plugin when WordPress Initialises.
     */
    public function init() {
        /* add page builder templates post type */
        $this->engine->registerTemplates();
    }
	
	/**
     * register and enque front end styles and scripts.
     *
     * @since 1.1.9
     */
    public function SSuprydpScripts() {

        wp_enqueue_style('SSuprydp_style', SSuprydp_URL . '/assets/css/sticky-sidebar.css', array(), SSuprydp_VERSION);
		wp_enqueue_script('SSuprydp_script', SSuprydp_URL . "/assets/js/sticky-sidebar.js", array('jquery'), SSuprydp_VERSION);


		$button_font1 = get_option('SSuprydp_button_option_font');
		$button_font2 = get_option('SSuprydp_content_option_font');
		$button_font3 = get_option('SSuprydp_action_option_font');
		$fontquery = urlencode(':ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800');
        
		 wp_enqueue_style(str_replace(' ','-',$button_font1), 'https://fonts.googleapis.com/css2?family='.$button_font1.$fontquery, [] , '');
		 wp_enqueue_style(str_replace(' ','-',$button_font2), 'https://fonts.googleapis.com/css2?family='.$button_font2.$fontquery, [] , '');
		 wp_enqueue_style(str_replace(' ','-',$button_font3), 'https://fonts.googleapis.com/css2?family='.$button_font3.$fontquery, [] , '');
		
		
		wp_enqueue_style('SSuprydp_font-awesome', SSuprydp_URL . '/assets/css/font-awesome.min.css', [] , SSuprydp_VERSION);
        wp_localize_script('SSuprydp_script', 'SSuprydp_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php')
                )
        );
    }

    public function SSuprydpAdminScripts() {
        wp_enqueue_script('wcolpick-js', SSuprydp_URL . '/assets/js/wcolpick.js', [], SSuprydp_VERSION);
		
        
        wp_enqueue_script('jquery-fontselect-js', SSuprydp_URL . '/assets/js/jquery.fontselect.js', [], SSuprydp_VERSION);

        wp_enqueue_script('SSuprydp_admin_script', SSuprydp_URL . '/assets/js/sticky-sidebar-admin.js',[], SSuprydp_VERSION);
		
		wp_enqueue_script('SSuprydp_popper', SSuprydp_URL . '/assets/js/popper.min.js',[], SSuprydp_VERSION);
		
		wp_enqueue_script('SSuprydp_bootstrap', SSuprydp_URL . '/assets/js/bootstrap.min.js',[], SSuprydp_VERSION);
		
		
        wp_enqueue_style('wcolpick-css', SSuprydp_URL . '/assets/css/wcolpick.css', [], SSuprydp_VERSION);
        
		wp_enqueue_style('fontselect-default', SSuprydp_URL . '/assets/css/fontselect-default.css', [], SSuprydp_VERSION);
       
        wp_enqueue_style('SSuprydp_admin_style', SSuprydp_URL . '/assets/css/sticky-sidebar-admin.css', [] , SSuprydp_VERSION);
		
       
		wp_enqueue_style('SSuprydp_font-awesome', SSuprydp_URL . '/assets/css/font-awesome.min.css', [] , SSuprydp_VERSION);
		
		wp_enqueue_style('SSuprydp_bootstrap', SSuprydp_URL . '/assets/css/bootstrap.min.css', [] , SSuprydp_VERSION);
		
		$button_font1 = get_option('SSuprydp_button_option_font');
		$button_font2 = get_option('SSuprydp_content_option_font');
		$button_font3 = get_option('SSuprydp_action_option_font');
		$fontquery = urlencode(':ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800');
		
        wp_enqueue_style(str_replace(' ','-',$button_font1), 'https://fonts.googleapis.com/css2?family='.$button_font1.$fontquery, [] , '');
		 wp_enqueue_style(str_replace(' ','-',$button_font2), 'https://fonts.googleapis.com/css2?family='.$button_font2.$fontquery, [] , '');
		 wp_enqueue_style(str_replace(' ','-',$button_font3), 'https://fonts.googleapis.com/css2?family='.$button_font3.$fontquery, [] , '');
		 wp_enqueue_media();
    }

      /**
     * Sticky Sidebar global modal
     */
    public function AddModal() {
        print $this->engine->getView('modal');
    }
	public function hstngr_register_widget() {
       
    }
	

	public function stick_sidebar_content() {
		
		
		$userrole = '';
		$user_role='';
		if(wp_get_current_user()){
			$current_user=wp_get_current_user();
			if(count($current_user->roles)>0){
				$user_role = $current_user->roles[0];
			}
		}
		if(get_option('SSuprydp_development') == 'live'){
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
			$SSuprydp_md = $this->engine->SSuprydpMobilededect();
			
			$content='';

			if($SSuprydp_md!="Yes"){
				$content .= '<div class="sticky-sidebar-wrap '.$SSuprydp_dm.' '.$SSuprydp_shrink_class.' ">';
				$content .= '<div class="sticky-sidebar-button" style="background-color: '.$SSuprydp_button_option_backg_color.';">';
				$content .= '<div style="font-family: '.$SSuprydp_button_option_font.'; font-weight: '.$SSuprydp_button_option_weight.'; font-size: '.$SSuprydp_button_option_size.'; color: '.$SSuprydp_button_option_color.'; text-align: '.$SSuprydp_button_option_align.';">'.$SSuprydp_button_option_text.'</div>';
				$content .= '</div>';
				$content .= '<a href="'.$SSuprydp_action_option_url.'" '.$SSuprydp_tb.' '.$SSuprydp_nf.'><div class="sticky-sidebar-image" style="background-image: url('.$Sticky_Sidebar_image.'); '. $SSuprydp_hideimg_cls.'"></div>';
				$content .= '<div class="stick-sidebar-container"><div class="sticky-sidebar-text" style="font-family: '.$SSuprydp_content_option_font.'; font-weight: '.$SSuprydp_content_option_weight.'; font-size: '.$SSuprydp_content_option_size.'; color: '.$SSuprydp_content_option_color.';">'.$SSuprydp_content_option_text.'</div>';
				$content .= '<div class="sticky-sidebar-call-to-action" style="font-family: '.$SSuprydp_action_option_font.'; font-weight: '.$SSuprydp_action_option_weight.'; font-size: '.$SSuprydp_action_option_size.'; color: '.$SSuprydp_action_option_color.'; border-top: solid 2px '.$SSuprydp_divider_option_color.';">'.$SSuprydp_action_option_text.'<span class="SSuprydp-icon"><i class="fa fa-chevron-right"></i></span></div>';
				/* $content .= '<p style="margin-left: 95px;"><i class="'.$ss_awesome_font.'"></i>'.$ss_awesome_font.'</p>'; */
				$content .= '</div></a></div>';	
			}
			echo $content;
			
		}else if(get_option('SSuprydp_development') == 'development' && $user_role=='administrator'){
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
			$SSuprydp_md = $this->engine->SSuprydpMobilededect();
			
			$content='';

			if($SSuprydp_md!="Yes"){
				$content .= '<div class="sticky-sidebar-wrap '.$SSuprydp_dm.' '.$SSuprydp_shrink_class.' ">';
				$content .= '<div class="sticky-sidebar-button" style="background-color: '.$SSuprydp_button_option_backg_color.';">';
				$content .= '<div style="font-family: '.$SSuprydp_button_option_font.'; font-weight: '.$SSuprydp_button_option_weight.'; font-size: '.$SSuprydp_button_option_size.'; color: '.$SSuprydp_button_option_color.'; text-align: '.$SSuprydp_button_option_align.';">'.$SSuprydp_button_option_text.'</div>';
				$content .= '</div>';
				$content .= '<a href="'.$SSuprydp_action_option_url.'" '.$SSuprydp_tb.' '.$SSuprydp_nf.'><div class="sticky-sidebar-image" style="background-image: url('.$Sticky_Sidebar_image.'); '. $SSuprydp_hideimg_cls.'"></div>';
				$content .= '<div class="stick-sidebar-container"><div class="sticky-sidebar-text" style="font-family: '.$SSuprydp_content_option_font.'; font-weight: '.$SSuprydp_content_option_weight.'; font-size: '.$SSuprydp_content_option_size.'; color: '.$SSuprydp_content_option_color.';">'.$SSuprydp_content_option_text.'</div>';
				$content .= '<div class="sticky-sidebar-call-to-action" style="font-family: '.$SSuprydp_action_option_font.'; font-weight: '.$SSuprydp_action_option_weight.'; font-size: '.$SSuprydp_action_option_size.'; color: '.$SSuprydp_action_option_color.'; border-top: solid 2px '.$SSuprydp_divider_option_color.';">'.$SSuprydp_action_option_text.'<span class="SSuprydp-icon"><i class="fa fa-chevron-right"></i></span></div>';
				/* $content .= '<p style="margin-left: 95px;"><i class="'.$ss_awesome_font.'"></i>'.$ss_awesome_font.'</p>'; */
				$content .= '</div></a></div>';	
			}
			echo $content;
			
		}else{
			echo '';
		}
	}
}
