<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Ligue_BN
 */

get_header();
$posts = query_posts( $query_string . '&orderby=title&order=asc&posts_per_page=-1' );
?>

	<div id="content" class="site-content no-left">

	<div id="primary" class="content-area">
		<main id="main" class="site-main hentry" role="main">
        <?php if ( have_posts() ) : ?>

			<header class="entry-header">
				<?php
					the_archive_title( '<h1 class="entry-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
            <section id="coacharchive" class="clearfix">
                <ul class="coachs clearfix">
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', 'minicoach' );

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
                </ul>
            </section>
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
