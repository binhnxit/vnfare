<?php
/**
 * Template for display Featured Content
 */
?>

<div class="" id="content-header">
	<div class="col-sm-5">
		<div id="featured-carousel" class="carousel slide">

			<div class="carousel-inner" role="listbox">

				<?php
					//do_action( 'alienship_featured_posts_before' );
					$args = array(
				    'numberposts' => 4,
				    );
				    $featured_posts = wp_get_recent_posts($args);
					// echo "<pre>";
					// print_r($featured_posts );die();

					// $featured_posts = alienship_get_featured_posts();
				    $i = 0;
					foreach ($featured_posts as $order => $post ) {
						$i++;
						 ?>
						<div class="item <?php if($i==1) echo "active"; ?>">
							<a href="<?php echo esc_url( get_permalink($post['ID']) ); ?>">
								<?php echo get_the_post_thumbnail( $post['ID'], 'large' ); ?>
								 <!-- <img src="<?php echo get_the_post_thumbnail( $post['ID'], 'large' ); ?>"/> -->
								 
								<div class="carousel-caption">
									<h3><?php echo $post['post_title']; ?></h3>
								</div><!-- .carousel-caption -->
							</a>
						</div><!-- .item -->
						<?php
						//get_template_part( '/templates/parts/content-featured-post' );
					}

					//do_action( 'alienship_featured_posts_after' );

					wp_reset_postdata();
				?>

			</div><!-- .carousel-inner -->

			<ol class="carousel-indicators">
			<?php
				$indicators = count( $featured_posts );
				$count = 0;
				while ( $count != $indicators ) {
					if($count==0){
						echo '<li data-target="#featured-carousel" data-slide-to="' . (int) $count . '" class="active"></li>';
					}else{
						echo '<li data-target="#featured-carousel" data-slide-to="' . (int) $count . '"></li>';
					}
					
					$count++;
				}
			?>
			</ol>

			<a class="left carousel-control" href="#featured-carousel" role="button" data-slide="prev">
				<span class="icon-prev"></span>
				<span class="sr-only"><?php _ex( 'Previous', 'Used to navigate the featured content carousel.', 'alienship' ); ?></span>
			</a>
			<a class="right carousel-control" href="#featured-carousel" role="button" data-slide="next">
				<span class="icon-next"></span>
				<span class="sr-only"><?php _ex( 'Next', 'Used to navigate the featured content carousel.', 'alienship' ); ?></span>
			</a>
		</div><!-- #featured-carousel -->
		<!-- bellow slide -->
		<div class="bellow-area">
		<?php 
			//query_posts('orderby=rand&showposts=5');
			//$r_posts = my_get_rand_posts(array('numberposts' => 5));
			 if ( have_posts() ) :
                $i = 0;
                while ( have_posts() ) : the_post(); if($i<4) :

                ?>
                <div class="no-padding bellow-slider">
					<article style="margin-bottom: 0px; padding: 3px 5px;" role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
							<div class="pull-left">
								<?php if ( has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); 	?>">
										<?php echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'aligncenter', 'title' => "" ) ); ?>
								</a>
								<?php } ?>
							</div>
							<div class="">
								<header class="entry-header">
									<?php the_title( sprintf( '<h5 class="entry-title" style="margin-bottom: 0px;"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ) ?>
								</header>
							</div>
							<div class="clearfix"></div>
						
					</article><!-- #post-<?php the_ID(); ?> -->

				</div>


			<?php endif; $i++; endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div><!-- .col-sm-5 -->
	<div class="col-sm-3 no-padding">
		<?php 
		query_posts('cat=3&orderby=date&order=DESC&showposts=6'); ?>
			<h3 class="widget-title box-title cat-title-head"><span class="square"><?php echo get_the_category_by_ID(3); ?></span></h3>
		<?php
		
		// $categories = get_categories();
		// echo "<pre>";
		// var_dump($categories);
		if ( have_posts() ) :
                $i = 0;
                while ( have_posts() ) : the_post(); 
                ?>
                	<div class="no-padding my-post-category-head">
						<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
								<div class="pull-left">
									<?php if ( has_post_thumbnail() ) { ?>
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); 	?>">
											<?php echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'aligncenter', 'title' => "" ) ); ?>
									</a>
									<?php } ?>
								</div>
								<div class="">
									<header class="entry-header">
										<?php the_title( sprintf( '<h5 class="entry-title" style="margin-bottom: 0px;"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ) ?>
									</header>
								</div>
								<div class="clearfix"></div>
							
						</article><!-- #post-<?php the_ID(); ?> -->

					</div>
                <?php

                endwhile;
        endif;
                
		// Reset Query
		wp_reset_query();
		?>
	</div> <!-- end col-sm-3 -->
	<div class="col-sm-4">
		<div class="ads">
			<img src="<?php echo get_template_directory_uri();?>/assets/images/16.jpg">

		</div>
		<div class="fanpage-face hidden-xs">
			<div class="fb-page" data-href="https://www.facebook.com/musicbands/" data-width="300px" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/musicbands/"><a href="https://www.facebook.com/musicbands/">Music Bands</a></blockquote></div></div>
		</div>

		
	</div>
	<div class="clearfix"></div>
</div><!-- .row -->