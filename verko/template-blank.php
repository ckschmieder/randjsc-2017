<?php
/**
 * Template Name: Blank
 *
 * The microsite page template.
 *
 */
?>

<?php get_header(); ?>

<div class="df_container-fluid fluid-width fluid-max col-full">

	<div class="main-sidebar-container">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; // end of the loop. ?>

	</div>

</div>

<?php get_footer(); ?>