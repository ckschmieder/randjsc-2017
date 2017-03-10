<?php get_header(); ?>

	<div id="content-wrap" class="df_container-fluid fluid-width fluid-max col-full">

		<div class="df_row-fluid main-sidebar-container">

			<div <?php dahz_attr('content'); ?>>

				<?php if (have_posts()) : // Check if have post. ?>

					<div class="df-search-page">

					<?php while (have_posts()) : the_post(); // Loads the post data. ?>

						<div class="df-search-result">
			                <?php
			                 if ( has_post_thumbnail()){ ?>
			                    <div class='df-search-image'>
			                        <a class="image_thum_post" href="<?php esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>" >
			                           <?php  the_post_thumbnail('dahz-small-thumb'); ?>
			                        </a>
			                    </div>
			                <?php } else {

			                $url_src = esc_url(get_template_directory_uri() . '/includes/assets/images/search.jpg');
			                ?>
				                <div class='df-search-image'>
					                <a href="<?php echo esc_url(get_permalink(get_the_ID())) ?>" rel="bookmark" title="">
					                	<img src="<?php echo $url_src ?>" class="" alt="">
					                </a>
				                </div>
			                 <?php } ?>
			                <div class="df-search-content">
								<h3><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
			                    <div class='df-postmeta'>
			                        <?php
			                            if (get_post_type() == 'page') {
			                                echo "<span class='search-post-on'>";
			                                    df_posted_on();
			                                echo "</span>";
			                            }else {
			                                df_posted_author();
			                                df_posted_on();
			                                df_category_blog();
			                            }
			                        ?>
			                    </div>
			                </div>
			            </div>
			            <div class="clear"></div>

						<?php if ( is_singular() ) : // If viewing a single post/page/CPT. ?>

							<?php if ( comments_open() || '0' != get_comments_number() ) : ?>

					 			<?php comments_template( '', true ); // Loads the comments.php template. ?>

							<?php endif; ?>

			 			<?php endif; // End check for single post. ?>

					<?php endwhile; // End of loads the post data. ?>

			   		</div>

					<?php df_pagenav(); ?>

				<?php else : ?>

				  	<?php dahz_get_template('content', 'none'); ?>

				<?php endif; ?>

	   		</div>

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer();	?>
