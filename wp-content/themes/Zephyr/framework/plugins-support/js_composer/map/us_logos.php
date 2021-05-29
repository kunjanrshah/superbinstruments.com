<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

/**
 * Shortcode: us_logos
 *
 * @var   $shortcode string Current shortcode name
 * @var   $config    array Shortcode's config
 *
 * @param $config    ['atts'] array Shortcode's attributes and default values
 */
vc_map(
	array(
		'base' => 'us_logos',
		'name' => __( 'Logos Showcase', 'us' ),
		'description' => '',
		'category' => us_translate( 'Content', 'js_composer' ),
		'weight' => 230,
		'params' => array(
			array(
				'type' => 'param_group',
				'param_name' => 'items',
				'params' => array(
					array(
						'heading' => us_translate( 'Image' ),
						'param_name' => 'image',
						'type' => 'attach_image',
						'std' => $config['items_atts']['image'],
						'edit_field_class' => 'vc_col-sm-6',
						'admin_label' => TRUE,
					),
					array(
						'heading' => us_translate( 'Link' ),
						'param_name' => 'link',
						'type' => 'vc_link',
						'std' => $config['items_atts']['link'],
						'edit_field_class' => 'vc_col-sm-6',
					),
				),
			),
			array(
				'param_name' => 'type',
				'heading' => __( 'Display items as', 'us' ),
				'type' => 'dropdown',
				'value' => array(
					__( 'Grid', 'us' ) => 'grid',
					__( 'Carousel', 'us' ) => 'carousel',
				),
				'std' => $config['atts']['type'],
				'admin_label' => TRUE,
				'edit_field_class' => 'vc_col-sm-6',
				'group' => us_translate( 'Appearance' ),
			),
			array(
				'param_name' => 'columns',
				'heading' => us_translate( 'Columns' ),
				'type' => 'dropdown',
				'value' => array(
					'1' => 1,
					'2' => 2,
					'3' => 3,
					'4' => 4,
					'5' => 5,
					'6' => 6,
					'7' => 7,
					'8' => 8,
				),
				'std' => $config['atts']['columns'],
				'admin_label' => TRUE,
				'edit_field_class' => 'vc_col-sm-6',
				'group' => us_translate( 'Appearance' ),
			),
			array(
				'param_name' => 'style',
				'heading' => __( 'Hover Style', 'us' ),
				'type' => 'dropdown',
				'value' => array(
					__( 'Fade + Outline', 'us' ) => '1',
					__( 'Fade', 'us' ) => '2',
					us_translate( 'None' ) => '3',
				),
				'std' => $config['atts']['style'],
				'admin_label' => TRUE,
				'group' => us_translate( 'Appearance' ),
			),
			array(
				'param_name' => 'with_indents',
				'type' => 'checkbox',
				'value' => array( __( 'Add indents between items', 'us' ) => TRUE ),
				( ( $config['atts']['with_indents'] !== FALSE ) ? 'std' : '_std' ) => $config['atts']['with_indents'],
				'group' => us_translate( 'Appearance' ),
			),
			array(
				'param_name' => 'orderby',
				'type' => 'checkbox',
				'value' => array( __( 'Display items in random order', 'us' ) => 'rand' ),
				( ( $config['atts']['orderby'] !== FALSE ) ? 'std' : '_std' ) => $config['atts']['orderby'],
				'group' => us_translate( 'Appearance' ),
			),
			array(
				'param_name' => 'el_class',
				'heading' => us_translate( 'Extra class name', 'js_composer' ),
				'type' => 'textfield',
				'std' => $config['atts']['el_class'],
				'group' => us_translate( 'Appearance' ),
			),
			array(
				'param_name' => 'carousel_arrows',
				'type' => 'checkbox',
				'value' => array( __( 'Show Navigation Arrows', 'us' ) => TRUE ),
				( ( $config['atts']['carousel_arrows'] !== FALSE ) ? 'std' : '_std' ) => $config['atts']['carousel_arrows'],
				'dependency' => array( 'element' => 'type', 'value' => 'carousel' ),
				'group' => __( 'Carousel Settings', 'us' ),
			),
			array(
				'param_name' => 'carousel_dots',
				'type' => 'checkbox',
				'value' => array( __( 'Show Navigation Dots', 'us' ) => TRUE ),
				( ( $config['atts']['carousel_dots'] !== FALSE ) ? 'std' : '_std' ) => $config['atts']['carousel_dots'],
				'dependency' => array( 'element' => 'type', 'value' => 'carousel' ),
				'group' => __( 'Carousel Settings', 'us' ),
			),
			array(
				'param_name' => 'carousel_center',
				'type' => 'checkbox',
				'value' => array( __( 'Enable first item centering', 'us' ) => TRUE ),
				( ( $config['atts']['carousel_center'] !== FALSE ) ? 'std' : '_std' ) => $config['atts']['carousel_center'],
				'dependency' => array( 'element' => 'type', 'value' => 'carousel' ),
				'group' => __( 'Carousel Settings', 'us' ),
			),
			array(
				'param_name' => 'carousel_slideby',
				'type' => 'checkbox',
				'value' => array( __( 'Slide by several items instead of one', 'us' ) => TRUE ),
				( ( $config['atts']['carousel_slideby'] !== FALSE ) ? 'std' : '_std' ) => $config['atts']['carousel_slideby'],
				'dependency' => array( 'element' => 'type', 'value' => 'carousel' ),
				'group' => __( 'Carousel Settings', 'us' ),
			),
			array(
				'param_name' => 'carousel_autoplay',
				'type' => 'checkbox',
				'value' => array( __( 'Enable Auto Rotation', 'us' ) => TRUE ),
				( ( $config['atts']['carousel_autoplay'] !== FALSE ) ? 'std' : '_std' ) => $config['atts']['carousel_autoplay'],
				'dependency' => array( 'element' => 'type', 'value' => 'carousel' ),
				'group' => __( 'Carousel Settings', 'us' ),
			),
			array(
				'param_name' => 'carousel_interval',
				'heading' => __( 'Auto Rotation Interval (in seconds)', 'us' ),
				'type' => 'textfield',
				'std' => $config['atts']['carousel_interval'],
				'dependency' => array( 'element' => 'carousel_autoplay', 'not_empty' => TRUE ),
				'group' => __( 'Carousel Settings', 'us' ),
			),
			array(
				'param_name' => 'breakpoint_1_width',
				'heading' => __( 'Below screen width', 'us' ),
				'type' => 'textfield',
				'std' => $config['atts']['breakpoint_1_width'],
				'edit_field_class' => 'vc_col-sm-6',
				'group' => us_translate( 'Responsive Options', 'js_composer' ),
			),
			array(
				'param_name' => 'breakpoint_1_cols',
				'heading' => __( 'show', 'us' ),
				'type' => 'dropdown',
				'value' => array(
					sprintf( us_translate_n( '%s column', '%s columns', 8 ), 8 ) => 8,
					sprintf( us_translate_n( '%s column', '%s columns', 7 ), 7 ) => 7,
					sprintf( us_translate_n( '%s column', '%s columns', 6 ), 6 ) => 6,
					sprintf( us_translate_n( '%s column', '%s columns', 5 ), 5 ) => 5,
					sprintf( us_translate_n( '%s column', '%s columns', 4 ), 4 ) => 4,
					sprintf( us_translate_n( '%s column', '%s columns', 3 ), 3 ) => 3,
					sprintf( us_translate_n( '%s column', '%s columns', 2 ), 2 ) => 2,
					sprintf( us_translate_n( '%s column', '%s columns', 1 ), 1 ) => 1,
				),
				'std' => $config['atts']['breakpoint_1_cols'],
				'edit_field_class' => 'vc_col-sm-6',
				'group' => us_translate( 'Responsive Options', 'js_composer' ),
			),
			array(
				'param_name' => 'breakpoint_1_autoplay',
				'type' => 'checkbox',
				'value' => array( __( 'Enable Auto Rotation', 'us' ) => TRUE ),
				( ( $config['atts']['breakpoint_1_autoplay'] !== FALSE ) ? 'std' : '_std' ) => $config['atts']['breakpoint_1_autoplay'],
				'dependency' => array( 'element' => 'type', 'value' => 'carousel' ),
				'group' => us_translate( 'Responsive Options', 'js_composer' ),
			),
			array(
				'param_name' => 'breakpoint_2_width',
				'heading' => __( 'Below screen width', 'us' ),
				'type' => 'textfield',
				'std' => $config['atts']['breakpoint_2_width'],
				'edit_field_class' => 'vc_col-sm-6',
				'group' => us_translate( 'Responsive Options', 'js_composer' ),
			),
			array(
				'param_name' => 'breakpoint_2_cols',
				'heading' => __( 'show', 'us' ),
				'type' => 'dropdown',
				'value' => array(
					sprintf( us_translate_n( '%s column', '%s columns', 8 ), 8 ) => 8,
					sprintf( us_translate_n( '%s column', '%s columns', 7 ), 7 ) => 7,
					sprintf( us_translate_n( '%s column', '%s columns', 6 ), 6 ) => 6,
					sprintf( us_translate_n( '%s column', '%s columns', 5 ), 5 ) => 5,
					sprintf( us_translate_n( '%s column', '%s columns', 4 ), 4 ) => 4,
					sprintf( us_translate_n( '%s column', '%s columns', 3 ), 3 ) => 3,
					sprintf( us_translate_n( '%s column', '%s columns', 2 ), 2 ) => 2,
					sprintf( us_translate_n( '%s column', '%s columns', 1 ), 1 ) => 1,
				),
				'std' => $config['atts']['breakpoint_2_cols'],
				'edit_field_class' => 'vc_col-sm-6',
				'group' => us_translate( 'Responsive Options', 'js_composer' ),
			),
			array(
				'param_name' => 'breakpoint_2_autoplay',
				'type' => 'checkbox',
				'value' => array( __( 'Enable Auto Rotation', 'us' ) => TRUE ),
				( ( $config['atts']['breakpoint_2_autoplay'] !== FALSE ) ? 'std' : '_std' ) => $config['atts']['breakpoint_2_autoplay'],
				'dependency' => array( 'element' => 'type', 'value' => 'carousel' ),
				'group' => us_translate( 'Responsive Options', 'js_composer' ),
			),
			array(
				'param_name' => 'breakpoint_3_width',
				'heading' => __( 'Below screen width', 'us' ),
				'type' => 'textfield',
				'std' => $config['atts']['breakpoint_3_width'],
				'edit_field_class' => 'vc_col-sm-6',
				'group' => us_translate( 'Responsive Options', 'js_composer' ),
			),
			array(
				'param_name' => 'breakpoint_3_cols',
				'heading' => __( 'show', 'us' ),
				'type' => 'dropdown',
				'value' => array(
					sprintf( us_translate_n( '%s column', '%s columns', 8 ), 8 ) => 8,
					sprintf( us_translate_n( '%s column', '%s columns', 7 ), 7 ) => 7,
					sprintf( us_translate_n( '%s column', '%s columns', 6 ), 6 ) => 6,
					sprintf( us_translate_n( '%s column', '%s columns', 5 ), 5 ) => 5,
					sprintf( us_translate_n( '%s column', '%s columns', 4 ), 4 ) => 4,
					sprintf( us_translate_n( '%s column', '%s columns', 3 ), 3 ) => 3,
					sprintf( us_translate_n( '%s column', '%s columns', 2 ), 2 ) => 2,
					sprintf( us_translate_n( '%s column', '%s columns', 1 ), 1 ) => 1,
				),
				'std' => $config['atts']['breakpoint_3_cols'],
				'edit_field_class' => 'vc_col-sm-6',
				'group' => us_translate( 'Responsive Options', 'js_composer' ),
			),
			array(
				'param_name' => 'breakpoint_3_autoplay',
				'type' => 'checkbox',
				'value' => array( __( 'Enable Auto Rotation', 'us' ) => TRUE ),
				( ( $config['atts']['breakpoint_3_autoplay'] !== FALSE ) ? 'std' : '_std' ) => $config['atts']['breakpoint_3_autoplay'],
				'dependency' => array( 'element' => 'type', 'value' => 'carousel' ),
				'group' => us_translate( 'Responsive Options', 'js_composer' ),
			),
		),
	)
);
vc_remove_element( 'vc_images_carousel' );
