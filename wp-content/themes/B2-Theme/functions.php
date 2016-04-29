<?php
/**
 * XB functions and definitions
 *
 * @package XB theme
 * @subpackage Functions
 * @author XB
 * @copyright Copyright (c) 2016, Xuân Bình Nguyễn
 * @link http://www.binhnx.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 940; // pixels


if ( ! function_exists( 'alienship_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support for post thumbnails.
 */
function alienship_setup() {

	// Custom template tags for this theme.
	locate_template( '/inc/template-tags.php', true );

	// Clean up header output
	locate_template( '/inc/cleanup.php', true );

	// Register the navigation menus.
	locate_template( '/inc/menus.php', true );
	locate_template( '/inc/wp_bootstrap_navwalker.php', true );

	// Register sidebars
	locate_template( '/inc/sidebars.php', true );

	// Customizer
	locate_template( '/inc/customizer.php', true );

	// Breadcrumbs
	if ( get_option( 'alienship_breadcrumbs', false ) ) {
		locate_template( '/inc/breadcrumb-trail.php', true );
	}

	// Custom functions that act independently of the theme templates
	locate_template( '/inc/tweaks.php', true );

	// Load the CSS
	locate_template( '/inc/stylesheets.php', true );

	// Load scripts
	locate_template( '/inc/scripts.php', true );

	// Load Theme Layouts extension and add theme support for desired layouts
	locate_template( '/inc/theme-layouts.php', true );
	add_theme_support( 'theme-layouts', array( '2c-r', '1c' ) );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on alienship, use a find and replace
	 * to change 'alienship' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'alienship', get_template_directory() . '/languages' );


	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Add support for custom backgrounds
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
	) );

	// Add support for post-thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add support for post formats. To be styled in later release.
	add_theme_support( 'post-formats', array(
		'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'
	) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'max_posts'               => 3,
		'featured_content_filter' => 'alienship_get_featured_posts',
	) );

	// Feature content image size
	add_image_size( 'featured-post', 750, 395, true );

	// Load Jetpack support
	locate_template( '/inc/jetpack.php', true );

}
endif; // alienship_setup
add_action( 'after_setup_theme', 'alienship_setup' );



/**
 * Displays a notice about menu functionality
 */
function alienship_admin_notice_menus() {

	global $current_user, $pagenow;

	// Check that we're an admin, that we're on the menus page, and that the user hasn't already ignored the message
	if ( current_user_can( 'administrator' ) && $pagenow =='nav-menus.php' && ! get_user_meta( $current_user->ID, 'alienship_admin_notice_menus_ignore_notice' ) ) {
		echo '<div class="updated"><p>';
		printf( __( 'A note about dropdown menus: They activate when clicked, not on mouse hover. This means that the top-level menu item does not click through to a page. It activates the dropdown. Also multi-level menus are not supported. Design your menus with this in mind. - <a href="%1$s">Hide this notice</a>' ), '?alienship_admin_notice_menus_ignore=0' );
		echo "</p></div>";
	}
}
add_action( 'admin_notices', 'alienship_admin_notice_menus' );



/**
 * Saves a setting when a user ignores the menu functionality notice
 * so it no longer shows it to that user.
 */
function alienship_admin_notice_menus_ignore() {

	// If user clicks to ignore the notice, add that to their user meta
	if ( isset( $_GET['alienship_admin_notice_menus_ignore'] ) && '0' == $_GET['alienship_admin_notice_menus_ignore'] ) {
		global $current_user;
		add_user_meta( $current_user->ID, 'alienship_admin_notice_menus_ignore_notice', 'true', true );
	}
}
add_action( 'admin_init', 'alienship_admin_notice_menus_ignore' );



if ( ! function_exists( 'alienship_locate_template_uri' ) ):
/**
 * Retrieve the URI of the highest priority template file that exists.
 *
 * Searches in the stylesheet directory before the template directory so themes
 * which inherit from a parent theme can just override one file.
 *
 * Snatched from future release code in WordPress repo.
 *
 * @param string|array $template_names Template file(s) to search for, in order.
 * @return string The URI of the file if one is located.
 */
function alienship_locate_template_uri( $template_names ) {

	$located = '';
	foreach ( (array) $template_names as $template_name ) {
		if ( ! $template_name )
			continue;

		if ( file_exists( get_stylesheet_directory() . '/' . $template_name ) ) {
			$located = get_stylesheet_directory_uri() . '/' . $template_name;
			break;
		} else if ( file_exists( get_template_directory() . '/' . $template_name ) ) {
			$located = get_template_directory_uri() . '/' . $template_name;
			break;
		}
	}

	return $located;
}
endif;



/**
 * Alien Ship RSS Feed Dashboard Widget
 *
 * Retrieves the latest news from Alien Ship home page
 * and outputs the admin dashboard widget.
 *
 * Change this to your own thing.
 */
function alienship_rss_dashboard_widget() {

	echo '<div class="rss-widget">';
	wp_widget_rss_output( array(
		'url'          => 'https://www.johnparris.com/alienship/feed',
		'title'        => __( 'Alien Ship News', 'alienship' ),
		'items'        => 3,
		'show_summary' => 1,
		'show_author'  => 0,
		'show_date'    => 1
	) );
	echo '</div>';
}



/**
 * Adds the admin dashboard widget containing the Alien Ship RSS Feed
 */
function alienship_custom_dashboard_widgets() {

	wp_add_dashboard_widget( 'alienship_custom_dashboard_feed', __( 'Alien Ship News', 'alienship' ), 'alienship_rss_dashboard_widget' );
}
add_action( 'wp_dashboard_setup', 'alienship_custom_dashboard_widgets' );



/**
 * Define theme layouts
 */
function alienship_layouts_strings() {

	$strings = array(
		'default' => __( 'Content left. Sidebar right.', 'alienship' ),
		'2c-r'    => __( 'Content right. Sidebar left.', 'alienship' ),
		'1c'      => __( 'Full width. No sidebar.', 'alienship' ),
	);
	return $strings;
}
add_filter( 'theme_layouts_strings', 'alienship_layouts_strings' );



/**
 * Apply the theme stylesheet to the visual editor.
 *
 * @uses add_editor_style()
 */
function alienship_editor_styles() {

	add_editor_style();
}
add_action( 'init', 'alienship_editor_styles' );



/**
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}


function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  echo $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}
// numbered pagination
function pagination($pages = '', $range = 12)
{  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}

@ini_set( 'upload_max_size' , '64M' );


