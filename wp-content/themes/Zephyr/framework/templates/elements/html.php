<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

/**
 * Output html element
 *
 * @var $content        string
 * @var $design_options array
 * @var $id             string
 */

$classes = '';
if ( isset( $design_options ) AND isset( $design_options['hide_for_sticky'] ) AND $design_options['hide_for_sticky'] ) {
	$classes .= ' hide-for-sticky';
}
if ( isset( $design_options ) AND isset( $design_options['hide_for_not-sticky'] ) AND $design_options['hide_for_not-sticky'] ) {
	$classes .= ' hide-for-not-sticky';
}
foreach ( array( 'default', 'tablets', 'mobiles' ) as $state ) {
	if ( ! us_is_header_elm_shown( $id, $state ) ) {
		$classes .= ' hidden_for_' . $state;
	}
}
if ( isset( $id ) AND ! empty( $id ) ) {
	$classes .= ' ush_' . str_replace( ':', '_', $id );
}
echo '<div class="w-html' . $classes . '">';
echo do_shortcode( $content );
echo '</div>';
