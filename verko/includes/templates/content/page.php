<article <?php dahz_attr( 'post' ); ?>>

	<div <?php dahz_attr( 'entry-content' ); ?>>
		
		<?php the_content(); ?>
			
		<?php wp_link_pages(); ?>

		<div class="clear"></div>

	</div><!-- .entry-content -->

	<div class="clear"></div>
	
	<?php edit_post_link(__('Edit', 'dahztheme'), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>'); ?>

</article><!-- .hentry -->