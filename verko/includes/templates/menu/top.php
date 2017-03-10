<?php if ( has_nav_menu( 'top-menu' ) ) : // Check if there's a menu assigned to the 'top-menu' location. ?>
	<nav <?php dahz_attr( 'menu', 'top-menu' );  ?>>
		<?php
		 wp_nav_menu( array(
		 	'depth' => 2,
		 	'sort_column' => 'menu_order',
		 	'container' => 'ul',
		 	'menu_id' => 'top-nav',
		 	'menu_class' => 'top-navigation',
		 	'theme_location' => 'top-menu'
		 	)
		 );
		?>
	</nav><!-- #site-navigation -->
<?php endif; ?>
