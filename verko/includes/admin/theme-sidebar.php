<?php

if ( ! function_exists( 'df_widgets_init' ) ) {
	function df_widgets_init()
	{
		if ( ! function_exists( 'register_sidebar' ) )
			return;

		// Primary Sidebar
		register_sidebar( array('name' => __('Primary Sidebar', 'dahztheme'), 'id' => 'primary', 'description' => __('The default primary sidebar for your website, used in two or three-column layouts.', 'dahztheme'), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));

		$total1 = df_options( 'primary_footer_widget_columns', dahz_get_default( 'primary_footer_widget_columns' ) );
			if ( is_numeric( $total1 ) != 0 ) {
				for ( $i = 1; $i <= intval( $total1 ) ; $i++ ) {
					register_sidebar( array( 'name' => sprintf( __( 'Footer %d', 'dahztheme' ), $i), 'id' => sprintf('footer-%d', $i), 'description' => sprintf(__('Widgetized Footer Region %d.', 'dahztheme'), $i), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
				}
			} else {

				if ( $total1 == 'half_third' ){
					for ($i = 1; $i <= 4; $i++) {
					register_sidebar( array( 'name' => sprintf( __('Footer %d', 'dahztheme'), $i), 'id' => sprintf('footer-%d', $i), 'description' => sprintf(__('Widgetized Footer Region %d.', 'dahztheme'), $i), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
					}
				} elseif ( $total1 == 'half_two' ){
					for ($i = 1; $i <= 3; $i++) {
					register_sidebar( array( 'name' => sprintf( __('Footer %d', 'dahztheme'), $i), 'id' => sprintf('footer-%d', $i), 'description' => sprintf(__('Widgetized Footer Region %d.', 'dahztheme'), $i), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
					}
				} elseif ( $total1 == 'third_half_third' ) {
					for ($i = 1; $i <= 3; $i++) {
					register_sidebar( array( 'name' => sprintf( __('Footer %d', 'dahztheme'), $i), 'id' => sprintf('footer-%d', $i), 'description' => sprintf(__('Widgetized Footer Region %d.', 'dahztheme'), $i), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
					}
				}

			}
	}
}

add_action( 'widgets_init', 'df_widgets_init' );
