<?php
/* === Removed Functions === */

/* Functions removed in the 1.2.1 branch. */
function df_get_template($composer, $base, $extension = ''){
	_deprecated_function( __FUNCTION__, '1.2.1', 'dahz_get_template( $composer, $base, $extension )' );
	return dahz_get_template($composer, $base, $extension = '');
}

/**
 * output meta head
 *
 * @since 2.1.0
 * @deprecated 2.2.0
 * @access public
 * @return void
 */
function dahz_meta () {
	_deprecated_function( __FUNCTION__, '2.2.0', 'wp_head()' );
	return wp_head();
}

/**
 * check if customizer is preview mode
 *
 * @since 2.1.0
 * @deprecated 2.2.0
 * @access public
 * @return void
 */
function df_is_customizing() {
	_deprecated_function( __FUNCTION__, '2.2.0', 'is_customize_preview()' );
	return is_customize_preview();
}
