<?php
/**
 * The template used to load the Top Navbar Menu in header*.php
 *
 * @package Alien Ship
 */
?>

	<div class="top-header">
		
			<div class="col-md-4">Logo</div>
			<div class="col-md-8">ADS</div>		
			<div class="clearfix"></div>
		

	</div>
	<!-- Top Menu -->
		<nav class="<?php echo apply_filters( 'alienship_top_navbar_class' , 'navbar navbar-inverse top-navigation' ); ?>" role="navigation">
			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand hidden-md hidden-lg" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			</div>

			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<?php wp_nav_menu( array(
					'theme_location' => 'top',
					'depth'          => 2,
					'container'      => false,
					'menu_class'     => 'nav navbar-nav',
					'walker'         => new wp_bootstrap_navwalker(),
					'fallback_cb'    => 'wp_bootstrap_navwalker::fallback'
					)
				); ?>
			</div>
		
		</nav>
	<!-- End Top Menu -->
