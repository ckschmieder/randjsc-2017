<?php
/**
 * Customizer Interface
 *
 * @package Dahz
 * @subpackage Customizer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'customize_register', 'dahz_customizer_register_autoload', 1 );
add_action( 'customize_register', 'dahz_build_customizer' );

/**
 * Build Customizer
 * @param mixed $wp_customize
 * @author Dahz
 * @return mixed
 * @since 1.2.1
 */
function dahz_build_customizer( $wp_customize ) {
		$controls = dahz_customizer_controls();
		// Early exit if controls are not set or if they're empty
		if ( ! isset( $controls ) || empty( $controls ) ) {
			return;
		}
		foreach ( $controls as $control ) {
			$priority       = ( isset( $control['priority'] ) ) ? $control['priority'] : '';
			$description    = ( isset( $control['description'] ) ) ? $control['description'] : '';
			$section        = ( isset( $control['section'] ) ) ? esc_attr( $control['section'] ) : '';
			$label					= ( isset( $control['label'] ) ) ? $control['label'] : '';
			$transport      = ( isset( $control['transport'] ) ) ? esc_attr( $control['transport'] ) : 'refresh';
			$input_attrs  	= ( isset( $control['input_attrs'] ) ) ? $control['input_attrs'] : array();
			$choices  			= ( isset( $control['choices'] ) ) ? $control['choices'] : array();
			$mode  					= ( isset( $control['mode'] ) ) ? $control['mode'] : '';
			$dir      			= ( isset( $control['direction'] ) ) ? $control['direction'] : '';
			$setting				= 'df_options['. $control['setting'] .']';
			$id							= sanitize_key( str_replace( '[', '-', str_replace( ']', '', $setting ) ) );
			$sanitize_cb    = dahz_get_sanitization( $control['type'] );
			$control_object = dahz_customize_object_controls( $control['type'] );

			$wp_customize->add_setting( $setting, array(
					'default'    => dahz_get_default( $control['setting'] ),
					'type'       => 'option',
					'capability' => 'edit_theme_options',
					'transport'  => $transport,
					'sanitize_callback' => $sanitize_cb,
				) );

				$option_control_parameters = array(
					'type'              => $control['type'],
					'priority'          => $priority,
					'section'           => $section,
					'label'             => $label,
					'description'       => $description,
					'settings'          => $setting
				);

				if( in_array( $control['type'], array( 'select', 'radio', 'images_radio' ) ) ) {
					$option_control_parameters['choices'] = $choices;
				}

			if( in_array( $control['type'], array( 'text', 'textarea', 'url', 'password', 'email', 'select' ) ) ) {
						$wp_customize->add_control( $id, $option_control_parameters );
			} else {
						$wp_customize->add_control( new $control_object ( $wp_customize, $id,
						 array_merge( $option_control_parameters, array( 'mode' => $mode, 'input_attrs' => $input_attrs ) )
						 ) );
				}
		}

}

/**
 * Create an array to manipulate data customizer control
 * @since 1.2.1
 * @return array
 */
function dahz_customizer_controls() {

	$controls = apply_filters( 'df_customizer_controls', array() );
	return $controls;

}

/**
 * Register autoloaders for Customizer-related classes.
 *
 * This function is hooked to customize_register so that it is only registered within the Customizer.
 *
 * @since 2.2.0
 *
 * @return void
 */
function dahz_customizer_register_autoload( $wp_customize ) {
    spl_autoload_register( 'dahz_autoload_classes' );

		$wp_customize->register_control_type( 'DAHZ_Subtitle_Control' );
		$wp_customize->register_control_type( 'DAHZ_TextDescription_Control' );
		$wp_customize->register_control_type( 'DAHZ_Layout_Picker_Control' );
		$wp_customize->register_control_type( 'DAHZ_Typography_Control' );
}

/**
 * Autoloader callback for loading custom Customizer control classes.
 *
 * @param $class_name
 * @return string
 */
function dahz_autoload_classes( $class_name ) {

  if ( 0 === stripos( $class_name, 'DAHZ' ) ) {
        $control_path = get_template_directory() . '/dahz/customizer/controls/';
        $filename = trailingslashit( $control_path ) . $class_name . '.php';
        if ( is_readable( $filename ) ) {
          require_once $filename;
        }
  }

}

/**
 * create object controls base on type for custom controls
 *
 * @access public
 * @param $type
 * @return string
 */
function dahz_customize_object_controls( $control_type ){
		switch ( $control_type ) {
			case 'description':
			return 'DAHZ_TextDescription_Control';
				break;

			case 'sub-title':
			return 'DAHZ_Subtitle_Control';
				break;

			case 'images_radio':
			return 'DAHZ_Layout_Picker_Control';
				break;

			case 'slider':
			return 'DAHZ_RangeSlider_Control';
				break;

			case 'uploader':
			return 'DAHZ_Media_Uploader_Control';
				break;

			case 'image':
			return 'WP_Customize_Image_Control';
				break;

			case 'color':
			return	'WP_Customize_Color_Control';
				break;

			case 'checkbox':
			return	'DAHZ_Checkbox_Control';
				break;

			case 'radio':
			return	'DAHZ_Radiobox_Control';
				break;
		}

		return FALSE;
	}

if ( ! function_exists( 'dahz_customizer_setting_defaults' ) ) :
/**
 * Filter the default values for the settings.
 *
 * @since 2.2.0
 *
 * @param array    $defaults    The list of default settings.
 */
function dahz_customizer_setting_defaults() {
	$defaults = apply_filters( 'dahz_customizer_setting_defaults', array() );
	return $defaults;
}
endif;

if ( ! function_exists( 'dahz_get_option_default' ) ) :
/**
 * Return a particular global option default.
 *
 * @since  2.2.0.
 *
 * @param  string    $mod    The key of the option to return.
 * @return mixed                Default value if found; false if not found.
 */
function dahz_get_default( $mod ) {
	$defaults = dahz_customizer_setting_defaults();
	$default  = ( isset( $defaults[ $mod ] ) ) ? $defaults[ $mod ] : false;

	/**
	 * Filter the retrieved default value.
	 *
	 * @since 2.2.0.
	 *
	 * @param mixed     $default    The default value.
	 * @param string    $option     The name of the default value.
	 */
	return apply_filters( 'dahz_customizer_get_default', $default, $mod );
}
endif;
