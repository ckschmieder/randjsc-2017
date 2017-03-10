<article <?php dahz_attr( 'post' ); ?>>

	<?php do_action( 'df_image_normal_post' ); ?>

	<div class="df-post-content">

		<?php if ( is_single( get_the_ID() ) ) : // If viewing a single post. ?>
				
			<header class="entry-header">

				<h1 <?php dahz_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

				<?php apply_filters( 'df_post_meta', 'post meta in each post layout' ); ?>

			</header><!-- .entry-header -->

			<div <?php dahz_attr( 'entry-content' ); ?>>

				<?php the_content(); ?>
	
				<?php wp_link_pages(); ?>
				
			</div><!-- .entry-content -->

			<?php apply_filters( 'df_single_blog_elements', 'tags share author postnav relatedpost' ); ?>

		<?php else : // If not viewing a single post. ?>
		
	        <header class="entry-header">

	        	<?php do_action( 'df_loop_post_title' ); ?>

				<?php apply_filters( 'df_post_meta', 'post meta in each post layout' ); ?>

			</header><!-- .entry-header -->

			<div <?php dahz_attr( 'entry-summary' ); ?>>

				<?php apply_filters( 'df_blog_share', 'Share blog' ); ?>
					
			</div><!-- .entry-summary -->

			<?php do_action( 'df_image_as_background' ); ?>

		<?php endif; // End single post check. ?>
		
	</div><!-- df-post-content -->
	
	<div class="clear"></div>
	
</article>