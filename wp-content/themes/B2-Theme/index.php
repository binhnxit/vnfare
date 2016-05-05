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
				<div class="sector1">
					<?php 
						get_template_part( '/templates/parts/sector1' );
					?>
				</div> <!-- end .sector1 -->


				<div class="sector2">
					<?php 
						get_template_part( '/templates/parts/sector2' );
					?>
					
				</div> <!-- end .sector2 -->


			</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer(); ?>