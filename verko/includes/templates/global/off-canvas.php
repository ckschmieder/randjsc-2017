<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

$layout             = df_layout_content();
$meta_sb_off_canvas = get_post_meta( df_get_the_id(), 'df_metabox_layout_sidebar_offcanvas', true );

$offcanvas 			= df_options( 'show_offcanvas', dahz_get_default( 'show_offcanvas' ) );
$show_offcanvas 	= $offcanvas == 1;


	if( 'one-col' == $layout && 1 == $meta_sb_off_canvas ):

?>
<div class="df-sidebar-off-canvas"><em class="md-more-vert"></em></div>

<div class="ui left sidebar wide overlay sidebar-off-canvas">
    <div class="nano-scroller">
        <div class="nano-content">
        	<!--OFF CANVAS-->
        	<div class="trigger">

        	</div>
            <aside <?php dahz_attr('sidebar'); ?> >
                <div itemprop="accessibilityFeature">

                <?php if(class_exists('sidebar_generator') && is_page()) : ?>

                    <?php do_action('before_sidebar'); ?>

                    <?php generated_dynamic_sidebar(); ?>

                <?php else : ?>

                    <?php do_action('before_sidebar'); ?>

                    <?php if (!dynamic_sidebar('primary')) : ?>

                        <aside id="search" class="widget widget_search">
                            <?php get_search_form(); ?>
                        </aside>

                        <aside id="archives" class="widget">
                            <h3 class="widget-title"><?php _e('Archives', 'dahztheme'); ?></h3>
                            <ul>
                                <?php wp_get_archives(array('type' => 'monthly')); ?>
                            </ul>
                        </aside>

                        <aside id="meta" class="widget">
                            <h3 class="widget-title"><?php _e('Meta', 'dahztheme'); ?></h3>
                            <ul>
                                <?php wp_register(); ?>
                                <li><?php wp_loginout(); ?></li>
                                <?php wp_meta(); ?>
                            </ul>
                        </aside>

                    <?php endif; // end sidebar widget area ?>

                <?php endif; ?>
                </div>
            </aside>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if( !is_customize_preview() ): ?>
<div class="ui right sidebar overlay navbar-off-canvas">
	<div class="nano-scroller">
		<div class="nano-content">

			<?php
			$df_header_navbar_pos = df_options( 'header_navbar_position', dahz_get_default( 'header_navbar_position' ) );

			if ( has_nav_menu( 'primary-menu' ) && $df_header_navbar_pos != 'split' ) : // Check if there's a menu assigned to the 'primary-menu' location. ?>
				<nav class="main-navigation">
					<?php
					    wp_nav_menu( array(
							'theme_location' => 'primary-menu',
							'depth' => 6,
							'sort_column' => 'menu_order',
							'container' => 'ul',
							'menu_id' => 'primary-off-canvas-menu',
							'menu_class' => 'off-canvas-navigation mobile-primary-navbar',
					    ) );
					 ?>
				</nav><!-- main-navigation -->
			<?php elseif ( $df_header_navbar_pos == 'split' ): ?>
				<nav class="main-navigation">
					<?php
					    wp_nav_menu( array(
					      	'theme_location' => 'split-left-menu',
							'depth' => 6,
							'sort_column' => 'menu_order',
							'container' => 'ul',
							'menu_id' => 'split-left-off-canvas-menu',
							'menu_class' => 'off-canvas-navigation mobile-primary-navbar',
					    ) );
					 ?>
					<?php
					    wp_nav_menu( array(
					     	'theme_location' => 'split-right-menu',
					      	'depth' => 6,
							'sort_column' => 'menu_order',
							'container' => 'ul',
							'menu_id' => 'split-right-off-canvas-menu',
							'menu_class' => 'off-canvas-navigation mobile-primary-navbar',
					    ) );
					 ?>

				</nav><!-- main-navigation -->
			<?php endif; ?>
			<?php if ( has_nav_menu( 'off-canvas-menu' ) ) : // Check if there's a menu assigned to the 'off-canvas-menu' location. ?>
			    <nav class="main-navigation">
			        <?php
			         wp_nav_menu( array(
			         	'depth' => 6,
			         	'sort_column' => 'menu_order',
			         	'container' => 'ul',
			         	'menu_id' => 'off-canvas-menu',
			         	'menu_class' => 'off-canvas-navigation off-canvas-menu',
			         	'theme_location' => 'off-canvas-menu'
			         	)
			         );
			        ?>
			    </nav><!-- #site-navigation -->
			<?php endif; ?>
			<?php if ( has_nav_menu( 'top-menu' ) ) : // Check if there's a menu assigned to the 'top-menu' location. ?>
				<nav class="main-navigation">
					<?php
					 wp_nav_menu( array(
					 	'depth' => 6,
					 	'sort_column' => 'menu_order',
					 	'container' => 'ul',
					 	'menu_id' => 'top-off-canvas-menu',
					 	'menu_class' => 'mobile-top-off-canvas off-canvas-navigation off-canvas-menu',
					 	'theme_location' => 'top-menu' ) );
					?>
				</nav><!-- #site-navigation -->
			<?php endif; ?>
			<div class="mobile-top-off-canvas off-canvas-menu">
	            <?php df_social_connect(); ?>
			</div>

		</div>
	</div>
</div>
<?php endif; ?>
