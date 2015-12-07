<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Ligue_BN
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-thumnail">
        <?php if ( !is_single() ) : ?>
        <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<?php endif; ?>
        <?php
            // Post thumbnail.
            the_post_thumbnail('list-post-thumbnails');
        ?>
        <?php if ( !is_single() ) : ?>
        </a>
		<?php endif; ?>
    </div>
	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->
    <?php if ( is_single() ) : ?>
    <div id="leftside" class="ui rail">
	   <div class="ui sticky">
    <?php endif; ?>
	<footer class="entry-footer">
		<?php liguebn_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'liguebn' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
    <?php if ( is_single() ) : ?>
	   </div>
	</div><!-- .sidebar -->
    <?php endif; ?>
	<div class="entry-content">
		<?php
			if ( is_single() ) :
			/* translators: %s: Name of current post */
                the_content( sprintf(
                    __( 'Continue reading %s', 'liguebn' ),
                    the_title( '<span class="screen-reader-text">', '</span>', false )
                ) );
			else :
                the_excerpt();
			endif;

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'liguebn' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'liguebn' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
