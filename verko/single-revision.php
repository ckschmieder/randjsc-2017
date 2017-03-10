<?php get_header(); ?>

<div id="content-wrap" class="df_container-fluid fluid-width fluid-max col-full">

	<div class="df_row-fluid main-sidebar-container">

		<?php df_isotope_category_blog(); ?>

		<div <?php dahz_attr('content'); ?>>

			<?php if (have_posts()) : // Check if have post. ?>

				<?php
				/**
				 * location function includes/functions/content-blog.php
				 * apply_filters( 'df_blog_class_wrapper', 'blog class' );
				 * this is a filter for blog layout class wi
				 * 0 => df_blog_grid_layout
				 * 5 => df_blog_list_index_add_class
				 */ ?>

				<div class="<?php esc_attr( apply_filters( 'df_blog_class_wrapper', 'blog type class' ) ); ?>">

				<?php while (have_posts()) : the_post(); // Loads the post data. ?>

					<?php dahz_get_content_template(); // Loads the includes/templates/content/*.php template. ?>

					<?php if ( is_singular() ) : // If viewing a single post/page/CPT. ?>

						<?php if ( comments_open() || '0' != get_comments_number() ) : ?>

				 			<?php comments_template( '', true ); // Loads the comments.php template. ?>

						<?php endif; ?>

		 			<?php endif; // End check for single post. ?>

				<?php endwhile; // End of loads the post data. ?>

				</div>

				<?php df_get_pagination(); ?>

	  	    <?php else : ?>

			  	<?php dahz_get_template('content', 'none'); ?>

			<?php endif; ?>

   		</div>

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer();	?>
