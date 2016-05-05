<div class="col-sm-6">
						<?php 
							query_posts('cat=4&orderby=date&order=DESC&showposts=4'); ?>
								<h3 class="widget-title box-title cat-title-head"><span class="square"><?php echo get_the_category_by_ID(4); ?></span></h3>
							<?php
							
							// $categories = get_categories();
							// echo "<pre>";
							// var_dump($categories);
							if ( have_posts() ) :
					                $i = 0;
					                while ( have_posts() ) : the_post(); $i++; ?>
					                <?php if($i==1) : ?>
					                <article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						                
						                	<?php if ( has_post_thumbnail() ) { ?>
											<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); 	?>">
													<?php echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'aligncenter', 'title' => "" ) ); ?>
											</a>
											<?php } ?>
											<header class="entry-header">
												<?php the_title( sprintf( '<h5 class="entry-title" style="margin-bottom: 0px;"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ) ?>
											</header>
						                
					                </article>
					           		<?php else:?>
					           		<div class="sector2-bellow">
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
											
										</article>

					           		</div> <!-- end sector2-bellow -->


									<?php endif;?>



					            <?php endwhile; ?>
					        <?php endif; 
					        // Reset Query
							wp_reset_query(); ?>
					</div> <!-- end .col-sm-6 -->
					<div class="col-sm-6">
						<?php 
							query_posts('cat=3&orderby=date&order=DESC&showposts=4'); ?>
								<h3 class="widget-title box-title cat-title-head"><span class="square"><?php echo get_the_category_by_ID(3); ?></span></h3>
							<?php
							
							// $categories = get_categories();
							// echo "<pre>";
							// var_dump($categories);
							if ( have_posts() ) :
					                $i = 0;
					                while ( have_posts() ) : the_post(); $i++; ?>
					                <?php if($i==1) : ?>
					                <article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						                
						                	<?php if ( has_post_thumbnail() ) { ?>
											<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); 	?>">
													<?php echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'aligncenter', 'title' => "" ) ); ?>
											</a>
											<?php } ?>
											<header class="entry-header">
												<?php the_title( sprintf( '<h5 class="entry-title" style="margin-bottom: 0px;"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ) ?>
											</header>
						                
					                </article>
					           		<?php else:?>
					           		<div class="sector2-bellow">
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
											
										</article>

					           		</div> <!-- end sector2-bellow -->


									<?php endif;?>



					            <?php endwhile; ?>
					        <?php endif; 
					        // Reset Query
							wp_reset_query(); ?>
					</div> <!-- end .col-sm-6 -->

					<div class="clearfix"></div>