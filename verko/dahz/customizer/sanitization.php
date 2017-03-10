<?php
/**
 * Sanitize Checkbox
 *
 * @param mixed $value
 * @return int|bool
 * @since 1.5.0
 */
function dahz_sanitize_checkbox( $value ) {
	return ( '1' != $value ) ? false : $value;
}


/**
 * Validate the given data, assuming it is from a textarea field.
 *
 * @return  void
 * @since   1.5.0
 */
function dahz_sanitize_textarea ( $value, $key ) {
	// Allow iframe, object, embed, a, p, em, strong and img tags in textarea fields.
	$allowed = wp_kses_allowed_html( 'post' );
	$allowed['iframe'] = array('src' => true, 'width' => true, 'height' => true, 'id' => true, 'class' => true, 'name' => true );
	$allowed['object'] = array('src' => true, 'width' => true, 'height' => true, 'id' => true, 'class' => true, 'name' => true );
	$allowed['embed'] = array('src' => true, 'width' => true, 'height' => true, 'id' => true, 'class' => true, 'name' => true );
	$allowed['a'] = array('href' => true, 'class' => true, 'target' => true );
	$allowed['p'] = array('style' => true, 'class' => true );
	$allowed['img'] = array('src'	=> true, 'alt'	=> true );
	$allowed['em'] = array('class' => true );
	$allowed['strong'] = array();

	return wp_kses( $value, $allowed );
}


/**
 * Sanitizes a range value
 *
 * @since 1.5.0
 *
 * @param string $value
 * @return int
 */
function dahz_sanitize_range( $value ) {
	if ( is_numeric( $value ) ) {
		return $value;
	}
	return 0;
}


/**
 * Default Sanitize
 *
 * @param mixed $value
 * @return mixed
 * @since  1.5.0
 */
function dahz_sanitize_default( $value ){
	return wp_kses_post( $value );
}

/**
 * Sanitization Helper's
 * @since 2.1.1
 */
function dahz_get_sanitization( $control_type ) {

			switch ( $control_type ) {
				case 'select' :
				case 'radio' :
					return 'sanitize_text_field';
					break;
				case 'image' :
				case 'uploader' :
					return 'esc_url_raw';
					break;
				case 'checkbox' :
					return 'dahz_sanitize_checkbox';
					break;
				case 'color' :
					return 'sanitize_hex_color';
					break;
				case 'text' :
					return 'esc_attr';
					break;
				case 'textarea' :
					return 'dahz_sanitize_textarea';
					break;
				case 'slider' :
					return 'dahz_sanitize_range';
					break;
				default:
					return 'dahz_sanitize_default';
			}

			return FALSE;

		}
