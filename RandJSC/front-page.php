<?php get_header(); ?>

<div id="hero_image" class="hero-image">
	<div class="hero-image__bg-image " style=" background-image:url('http://www.dev.randjsc.com/wp-content/uploads/videos/home-mobile-bg.jpg'); display: none; "></div>
	<video class="hero-image__video" muted autoplay loop>
		<source src="http://www.dev.randjsc.com/wp-content/uploads/videos/Video-Montage-Homepage-720p.mp4" type="video/mp4">
		<source src="http://www.dev.randjsc.com/wp-content/uploads/videos/Video-Montage-Homepage-720p.ogv" type="video/ogg">
		<source src="http://www.dev.randjsc.com/wp-content/uploads/videos/Video-Montage-Homepage-720p.webm" type="video/webm">
	</video>
	<div class="image-overlay"></div>
	<div class="typed-wrap">
		<!-- <h1>Line 1 text<br>Line 2 text<br>Line 3 text<br>Line 4 text<br></h1> -->
		<div class="typed-wrap">
			<div>We're your</div>
			<div><strong>go-to</strong></div>
			<div><span class="typed-words" style="color: #c0da6b;"><?php echo do_shortcode('[typed string0="public relations" string1="communications" string2="digital marketing" string3="design" string4="development" typeSpeed="50" startDelay="0" backSpeed="20" backDelay="1400" loop="1"]'); ?> </span></div>
			<div><strong>agency</strong></div>
		</div>
	</div>
</div> <!-- END #hero_image -->
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
					<div class="schmieder">						
						
					<?php dahz_get_content_template(); // Loads the includes/templates/content/*.php template. ?>

					<?php if ( is_singular() ) : // If viewing a single post/page/CPT. ?>

						<?php if ( comments_open() || '0' != get_comments_number() ) : ?>

				 			<?php comments_template( '', true ); // Loads the comments.php template. ?>

						<?php endif; ?>

		 			<?php endif; // End check for single post. ?>
		 			</div> <!-- END .schmieder -->
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
