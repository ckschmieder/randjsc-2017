<?php
global $df_options;
$df_bg_mode_lay  = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true );
$df_blog_layout  = is_archive() ? $df_options[ 'archive_layout' ] : $df_options[ 'blog_layout' ];
$df_grid_type    = is_archive() ? $df_options[ 'arch_content_grid' ] : $df_options[ 'blog_content_grid' ];
?>

<article <?php dahz_attr( 'post' ); ?>>

	<?php do_action( 'df_image_normal_post' ); ?>

	<div class="df-post-content">

		<?php if ( is_single( get_the_ID() ) ) : // If viewing a single post. ?>

			<div <?php dahz_attr( 'entry-summary' ); ?>>

				<div class="df_content-bg status-icon"></div>

				<?php the_content(); ?>

				<?php wp_link_pages(); ?>

			</div><!-- .entry-content -->

			<header class="entry-header">

				<h1 <?php dahz_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

				<?php apply_filters( 'df_post_meta', 'post meta in each post layout' ); ?>

			</header><!-- .entry-header -->

			<?php apply_filters( 'df_single_blog_elements', 'tags share author postnav relatedpost' ); ?>

		<?php else : // If not viewing a single post. ?>

			<header class="entry-header">

				<?php do_action( 'df_loop_post_title' ); ?>

				<?php apply_filters( 'df_post_meta', 'post meta in each post layout' ); ?>

			</header><!-- .entry-header -->

			<div <?php dahz_attr( 'entry-summary' ); ?>>

				<?php if( $df_bg_mode_lay != '1' && ( $df_blog_layout == 'list' || ( $df_blog_layout == 'grid' && $df_grid_type == 'masonry' ) ) ): ?>

					<div class="df_content-bg status-icon"></div>

				<?php endif; ?>

				<?php if( $df_bg_mode_lay != '1' && ( $df_blog_layout == 'list' || ( $df_blog_layout == 'grid' && $df_grid_type == 'masonry' ) ) ): ?>

					<?php the_content(); // function in includes/admin/functions/content-blog.php ?>

				<?php endif; ?>

				<?php apply_filters( 'df_blog_share', 'Share blog' ); ?>

			</div><!-- .entry-summary -->

			<?php do_action( 'df_image_as_background' ); ?>

		<?php endif; // End single post check. ?>

		<div class="clear"></div>

	</div><!-- df-post-content -->

</article>