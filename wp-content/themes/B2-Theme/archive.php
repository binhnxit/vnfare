<?php
/**
 * The template for displaying Archive pages.
 *
 * @package Alien Ship
 */

get_header(); ?>

	<section id="primary" class="content-area col-md-8">

		<main id="main" class="site-main" role="main">
			<?php
			/**
			 * Print the archive page title.
			 * See inc/template-tags.php
			 */
			alienship_archive_page_title();

			if ( have_posts() ) :
				$i=0;
				// Start the Loop
				while ( have_posts() ) : the_post();
					do_action( 'alienship_loop_before' );
					$i++;
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( '/templates/parts/content', get_post_format() );
					if($i%3==0) echo "<div class=\"clearfix\"></div>";
					do_action( 'alienship_loop_after' );
				endwhile;
				echo "<div class=\"clearfix\"></div>";
				// Show navigation below post content
				alienship_content_nav( 'nav-below' );

			else :

				// No results
				get_template_part( '/templates/parts/content', 'none' );

			endif; ?>
		</main><!-- #main -->

	</section><!-- #primary -->
<?php
get_sidebar();
get_footer(); ?>