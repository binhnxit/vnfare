<?php
/**
 * The main template file.
 *
 * @package Alien Ship
 */

get_header(); ?>
		<?php 
			get_template_part( '/templates/parts/featured-content' );
		?>
		<div id="primary" class="content-area col-md-8">
			<main id="main" class="site-main" role="main">
			

			<h3 class="widget-title box-title"><span class="square">Recent Posts</span></h3>
			<?php
			
				

				//if( is_front_page() && alienship_has_featured_posts() ) {
					// Load featured post content
					//get_template_part( '/templates/parts/featured-content' );
				//}
				//query_posts('posts_per_page=10');
				if ( have_posts() ) :
					$i=0;
					// Start the Loop
					while ( have_posts() ) : the_post();

						do_action( 'alienship_loop_before' );
						$i++;

						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme then include a file called content-___.php
						 * (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( '/templates/parts/content', get_post_format() );
						if($i%3==0) echo "<div class=\"clearfix\"></div>";
						do_action( 'alienship_loop_after' );

						

					endwhile;
					echo "<div class=\"clearfix\"></div>";
					//alienship_content_nav( 'nav-below' ); // display content nav below posts?
					pagination($custom_query->max_num_pages);
						

				else :

					// No results
					get_template_part( '/templates/parts/content', 'none' );

				endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer(); ?>