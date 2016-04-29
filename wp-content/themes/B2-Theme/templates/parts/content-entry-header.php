<?php
/**
 * The template part for displaying the post entry header
 * containing the published date and author byline.
 */
?>
<header class="entry-header">
	<?php is_singular() ? the_title( sprintf( '<h4 class="entry-title">', esc_url( get_permalink() ) ), '</h4>' ) : the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ) ?>

	
</header>