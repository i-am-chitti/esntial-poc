<?php
/**
 * Mobility Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mobility
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_MOBILITY_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'mobility-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_MOBILITY_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

function caiem_get_value( $key ) {
	$cai_esntial_motors = CoxAutoInc_Esntial_Motors::get_instance();
	return $cai_esntial_motors->get_field_value( $key );
}

function caiem_get_attributes( $key ) {
	$cai_esntial_motors = CoxAutoInc_Esntial_Motors::get_instance();
	return $cai_esntial_motors->get_field_attributes( $key );
}

function caiem_get_css_classes( $key ) {
	$cai_esntial_motors = CoxAutoInc_Esntial_Motors::get_instance();
	return $cai_esntial_motors->get_field_css_classes( $key );
}
