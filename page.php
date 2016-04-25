<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Ligue_BN
 */

get_header(); ?>
	<div id="content" class="site-content no-left">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', get_post_format() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

	</div><!-- .site-content -->

	<aside id="rightside" class="ui rail">
	   <div class="ui sticky">
        <?php if ( is_single() || is_page() ) : ?>
		<?php dynamic_sidebar( 'right-single' ); ?>
        <?php else : ?>
		<?php dynamic_sidebar( 'right' ); ?>
        <?php endif; ?>
	   </div>
	</aside><!-- .sidebar -->

<?php get_footer(); ?>
