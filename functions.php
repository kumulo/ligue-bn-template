<?php
/**
 * Ligue BN functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Ligue_BN
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 */

if ( ! function_exists( 'liguebn_setup' ) ) :
function liguebn_setup() {
    load_theme_textdomain( 'liguebn', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 750, 345, true );
	add_image_size( 'list-post-thumbnails',  750, 345, array( 'center', 'center') );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
	add_post_type_support( 'page', 'post-formats');
}
endif; // liguebn_setup
add_action( 'after_setup_theme', 'liguebn_setup' );

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function liguebn_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'liguebn_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function liguebn_scripts() {
	// Load our libs stylesheet.
	wp_enqueue_style( 'liguebn-libs-style', get_template_directory_uri() . '/dist/libs.min.css' );
	// Load our main stylesheet.
	wp_enqueue_style( 'liguebn-style', get_template_directory_uri() . '/dist/app.min.css' );
	// Load our libs javascript.
	wp_enqueue_script( 'liguebn-libs', get_template_directory_uri() . '/dist/libs.min.js' );
	// Load our main javascript.
	wp_enqueue_script( 'liguebn-app', get_template_directory_uri() . '/dist/app.min.js' );
}
add_action( 'wp_enqueue_scripts', 'liguebn_scripts' );

/**
 * Register widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function liguebn_widgets_init() {
	register_widget( 'ClassementWidget' );
	register_sidebar( array(
		'name'          => __( 'Left Side', 'liguebn' ),
		'id'            => 'left',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'liguebn' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Right Side', 'liguebn' ),
		'id'            => 'right',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'liguebn' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Left Side for single pages', 'liguebn' ),
		'id'            => 'left-single',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'liguebn' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'liguebn_widgets_init' );

function add_menu_item_class( $items ) {

	$parents = array();
	foreach ( $items as $item ) {
	}

	foreach ( $items as $item ) {
		if ( $item->is_item_home ) {
			$item->classes[] = 'the-fucking-home';
		}
        $item->classes[] = 'item';
	}

	return $items;
}
add_filter( 'wp_nav_menu_objects', 'add_menu_item_class' );

require get_template_directory() . '/inc/custom-widget.php';
