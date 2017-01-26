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
function my_image_sizes($sizes) {
    $addsizes = array(
    "gallery-thumbnails" => __( "Gallery thumbnails")
    );
    $newsizes = array_merge($sizes, $addsizes);
    return $newsizes;
}
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
	add_image_size( 'gallery-thumbnails',  400, 400, array( 'center', 'center') );
	add_image_size( 'coach-thumbnails',  330, 550, array( 'center', 'center') );
    add_image_size( 'team-logo', 300, 300, array( 'center', 'center') );
    add_filter('image_size_names_choose', 'my_image_sizes');

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'liguebn' ),
		'social'  => __( 'Social Links Menu', 'liguebn' ),
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
		'aside', 'image', 'video', 'gallery', 'paquet'
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


if ( ! function_exists( 'liguebn_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 */
function liguebn_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'liguebn' ) );
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( __( 'Leave a comment', 'liguebn' ), __( '1 Comment', 'liguebn' ), __( '% Comments', 'liguebn' ) );
		echo '</span>';
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		$time_string = '<time class="entry-date published updated clearfix" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			'<span class="day">' . get_the_date('j') . ' </span><span class="month">' . get_the_date('F') . ' </span><span class="year">' . get_the_date('Y') . '</span>',
			esc_attr( get_the_modified_date( 'c' ) ),
			get_the_modified_date()
		);

		printf( '<span class="posted-on"><h2 class="screen-reader-text">%1$s </h2>%2$s</span> ',
			_x( 'Posted on', 'Used before publish date.', 'liguebn' ),
			$time_string
		);
	}

	if ( 'post' == get_post_type() ) {
		if ( is_singular() && get_the_author_meta( 'description' ) ) {
			get_template_part( 'author-bio' );
		}
		else if (is_multi_author() ) {
			printf( '<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span> ',
				_x( 'By', 'Used before post author name.', 'liguebn' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'liguebn' ) );
		if ( $categories_list && liguebn_categorized_blog() ) {
			printf( '<span class="cat-links"><h2 class="screen-reader-text">%1$s </h2>%2$s</span> ',
				_x( 'Posted in', 'Used before category names.', 'liguebn' ),
				$categories_list
			);
		}

		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'liguebn' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><h2 class="screen-reader-text">%1$s </h2>%2$s</span> ',
				_x( 'Tags', 'Used before tag names.', 'liguebn' ),
				$tags_list
			);
		}
	}
}

function excerpt_read_more_link($output) {
    global $post;
    return $output . '<div class="more-link"><a class="ui button bngreen" href="'. get_permalink($post->ID) . '">' .
            sprintf( __( 'Continue reading %s', 'liguebn' ), get_the_title()) .
            '<i class="caret right icon"></i>' .
        '</a></div>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');

if ( ! function_exists( 'liguebn_comment_form' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 */
function liguebn_comment_form_before() {
        echo '<div class="ui form">';
}
add_action( 'comment_form_before', 'liguebn_comment_form_before' );
function liguebn_comment_notes_after() {
        echo '</div>';
}
add_action( 'comment_notes_after', 'liguebn_comment_notes_after' );
function liguebn_comment_form() {
    $comment_args = array(
        'fields' => apply_filters(
            'comment_form_default_fields', array(
                'author' => '<div class="field">' .
                            '<label for="author">' . __( 'Name', 'liguebn' ) . '</label> ' .
                            ( $req ? '<span class="required">*</span>' : '' ) .
                            '<input id="author" name="author" type="text" value="' .
                            esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' .
                            '</div>',
                'email'  => '<div class="field">' .
                            '<label for="email">' . __( 'Email', 'liguebn' ) . '</label> ' .
                            ( $req ? '<span class="required">*</span>' : '' ) .
                            '<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' .
                            '</div>',
                'url'    => '<div class="field">' .
                            '<label for="url">' . __( 'Website', 'liguebn' ) . '</label>' .
                            '<input id="url" name="url" placeholder="' . __( 'http://your-site-name.com', 'liguebn' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' .
                            '</div>'
            )
        ),
        'comment_field' => '<div class="field">' .
                    '<label for="comment">' . __( 'Comment', 'liguebn' ) . '</label>' .
                    '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' .
                    '</div>',
        'class_submit' => 'submit ui button'
    );
    comment_form($comment_args);
}
endif;

/**
 * Determine whether blog/site has more than one category.
 *
 * @return bool True of there is more than one category, false otherwise.
 */
function liguebn_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'liguebn_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'liguebn_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so liguebn_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so liguebn_categorized_blog should return false.
		return false;
	}
}
endif;

if ( ! function_exists( 'liguebn_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 */
function liguebn_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'liguebn' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'liguebn' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'liguebn' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
endif;

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
	register_sidebar( array(
		'name'          => __( 'Right Side for single pages', 'liguebn' ),
		'id'            => 'right-single',
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

function my_theme_archive_title( $title ) {
    if ( get_post_type() == 'coach' ) {
        $title = "Le paquet de BN";
    }

    return $title;
}

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

require get_template_directory() . '/inc/custom-widget.php';
