<?php
/**
 * 404 page.
 *
 */
?>

<?php get_header(); ?>

	<article <?php dahz_attr('content') ?>>

		<section class="error-404 not-found">

			<div class="content-404">

				<div class="header-404">

					<h1><?php _e('Ooops!', 'dahztheme'); ?></h1>
					<h2><?php _e('404 error - page not found', 'dahztheme'); ?></h2>

				</div>

				<div class="text-404">

					<p>
						<?php _e('You can search our site using the search box below or return to the', 'dahztheme'); ?>
						<a class="df-link" href="<?php echo esc_url( get_home_url() ); ?>"><?php _e('Homepage', 'dahztheme'); ?></a>
					</p>

				</div>

				<?php get_search_form(); ?>

			</div>

		</section><!-- .error-404 -->

	</article>

<?php get_footer(); ?>