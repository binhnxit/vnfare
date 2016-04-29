<?php
/**
 * @package Alien Ship
 */
?>
<div class="col-sm-4 main-post-item">
	<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="img-thumb">
				<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); 	?>">
						<?php echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'aligncenter', 'title' => "" ) ); ?>
				</a>
			</div>
			<div class="content-item">
				<?php
					} // has_post_thumbnail()
				get_template_part( '/templates/parts/content-entry-header' ); ?>

				<div class="entry-content">
					<?php

					// Display excerpt on archives, full content in singular views.
					is_singular() ? the_content() : excerpt(20);

					wp_link_pages(); ?>
				</div><!-- .entry-content -->

				

			</div>
			<?php get_template_part( '/templates/parts/content-entry-footer' ); ?>
			<!-- <div class="clearfix"></div> -->
	</article><!-- #post-<?php the_ID(); ?> -->

</div>
