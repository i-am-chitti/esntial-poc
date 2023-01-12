<?php
/**
 * Plugin Name: CoxAutoInc Esntial Motors
 * Description: CoxAutoInc Esntial Motors
 * Plugin URI:  https://www.coxautoinc.com
 * Author:      rtCamp, kiranpotphode
 * Author URI:  https://rtcamp.com
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version:     1.0
 * Text Domain: coxautoinc-esntial-motors
 *
 * @package coxautoinc-esntial-motors
 */

defined( 'ABSPATH' ) || die();

/**
 * Class CoxAutoInc_Esntial_Motors.
 */
class CoxAutoInc_Esntial_Motors {
	/**
	 * Instance variable.
	 *
	 * @var null
	 */
	private static $_instance = null;

	/**
	 * Get an instance of this class.
	 *
	 * @return CoxAutoInc_Esntial_Motors
	 */
	public static function get_instance() {
		if ( null === self::$_instance ) {
			self::$_instance = new CoxAutoInc_Esntial_Motors();
		}

		return self::$_instance;
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'add_scripts' ) );

		// add_filter( 'gform_pre_render', array( $this, 'set_form_parameters' ) );
	}

	/**
	 * Add scripts.
	 *
	 * @return void
	 */
	public function add_scripts() {
		wp_register_script( 'coxautoinc-esntial-motors-js', plugin_dir_url( __FILE__ ) . '/js/coxautoinc-esntial-motors.js', array( 'jquery' ), filemtime( plugin_dir_path( __FILE__ ) . '/js/coxautoinc-esntial-motors.js' ), true );
		wp_register_style( 'coxautoinc-esntial-motors-css', plugin_dir_url( __FILE__ ) . '/css/coxautoinc-esntial-motors.css', 'coxautoinc-esntial-motors-js', filemtime( plugin_dir_path( __FILE__ ) . '/css/coxautoinc-esntial-motors.css' ) );

		wp_enqueue_script( 'coxautoinc-esntial-motors-js' );
		wp_enqueue_style( 'coxautoinc-esntial-motors-css' );

		wp_register_script( 'coxautoinc-esntial-motors-split-js', 'https://unpkg.com/split-grid/dist/split-grid.js' );
		wp_enqueue_script( 'coxautoinc-esntial-motors-split-js' );
	}

	public function set_form_parameters( $form ) {

		if ( 3 === $form['id'] ) {
			foreach ( $form['fields'] as $key => &$field ) {
				$field->cssClass .= ' ' . $field->adminLabel;
				$form['fields'][ $key ] = $field;
			}
		}

		return $form;
	}

	public function get_entry_by_retailer( $retailer = '' ) {
		$retailer     = ! empty( $_GET['retailer'] ) ? $_GET['retailer'] : $retailer;
		$resume_token = ! empty( $_GET['gf_token'] ) ? $_GET['gf_token'] : '';

		if ( ! empty( $retailer ) || ! empty( $resume_token ) ) {
			$form_id = 3;
			$form    = GFAPI::get_form( $form_id );

			$email_field_id         = null;
			$formatted_entry_fields = array();
			if ( ! empty( $form['fields'] ) ) {
				foreach ( $form['fields'] as $field ) {

					$formatted_entry_fields[ $field->adminLabel ] = $field->id;
					if ( 'email' === $field->type ) {
						$email_field_id = $field->id;
					}
				}
			}

			$search_criteria['field_filters']         = array();
			$search_criteria['field_filters']['mode'] = 'any';
			$search_criteria['field_filters'][]       = array(
				'key'   => $email_field_id,
				'value' => $retailer,
			);
			$search_criteria['field_filters'][]       = array(
				'key'   => 'resume_token',
				'value' => $resume_token,
			);

			$entries = GFAPI::get_entry_ids( $form_id, $search_criteria );

			if ( ! empty( $entries ) ) {

				foreach ( $entries as $entry ) {
					$result = GFAPI::get_entry( (int) $entry );

					$formatted_entry = array();
					foreach ( $formatted_entry_fields as $formatted_entry_field_key => $formatted_entry_field_value ) {
						$formatted_entry[ $formatted_entry_field_key ] = $result[ $formatted_entry_field_value ];
					}

					return $formatted_entry;
					break;
				}
			}
		}

		return array();
	}

	public function get_field_value( $key, $retailer = null, $default = '' ) {
		$retailer = ! empty( $_GET['retailer'] ) ? $_GET['retailer'] : '';

		$entry = $this->get_entry_by_retailer( $retailer );

		return $entry[ $key ];
	}

	public function get_field_attributes( $key ) {
		return 'data-gfield="' . $key . '" contenteditable="true"';
	}

	public function get_field_css_classes( $key = '' ) {
		return 'gf-live-preview ' . $key;
	}
}

CoxAutoInc_Esntial_Motors::get_instance();
