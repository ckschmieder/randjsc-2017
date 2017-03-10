<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e( 'Search for:', 'dahztheme' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search ...', 'dahztheme' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php esc_attr_e( 'Search for:', 'dahztheme' ); ?>">
	</label>
	<button type="submit" class="fa fa-search submit" name="submit" value="Search"></button>
</form>