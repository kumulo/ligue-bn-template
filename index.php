<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Ligue_BN
 */

get_header(); ?>
	<aside id="leftside" class="ui rail">
	   <div class="ui sticky">
        <?php if ( is_single() || is_page() ) : ?>
		<?php dynamic_sidebar( 'left-single' ); ?>
        <?php else : ?>
		<?php dynamic_sidebar( 'left' ); ?>
        <?php endif; ?>
	   </div>
	</aside><!-- .sidebar -->
	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'liguebn' ),
				'next_text'          => __( 'Next page', 'liguebn' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'liguebn' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
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
