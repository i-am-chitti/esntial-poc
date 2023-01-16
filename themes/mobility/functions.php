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

add_filter('gform_field_content', function ( $field_content, $field ) {
    if ( $field->type !== 'fileupload' ) {
		return str_replace( 'type=', sprintf("x-model='%s' type=", $field->adminLabel), $field_content );
    }
    return $field_content;
}, 10, 2);

// add_filter(
//     'gform_file_upload_markup',
//     'gf_test_file_upload_markup',
//     10,
//     4
// );

// function gf_test_file_upload_markup( $file_upload_markup, $file_info, $form_id, $id ) {
//     $file_upload_markup .= '<div class="gf-test">GF Test</div>';
//     $file_upload_markup .= '<img width="20px" height="20px" src=" ' . RGFormsModel::get_upload_url( $form_id ) . '/tmp/' . $file_info['temp_filename'] . ' " />';

//     return $file_upload_markup;
// }
