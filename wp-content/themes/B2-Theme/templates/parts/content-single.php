<?php
/**
 * @package Alien Ship
 */
?>

<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
			<?php if ( has_post_thumbnail() ) { ?>
		
			<?php
				} // has_post_thumbnail()
			get_template_part( '/templates/parts/content-singel-header' ); ?>

			<div class="entry-content">
				<?php

				// Display excerpt on archives, full content in singular views.
				is_singular() ? the_content() : excerpt(30);

				wp_link_pages(); ?>
			</div><!-- .entry-content -->

			

		
		<?php get_template_part( '/templates/parts/content-entry-footer' ); ?>
		
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
