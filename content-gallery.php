<?php
/**
 * The template for displaying posts in the Gallery post format
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<div id="gallery-container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div id="gallery-wrapper" class="entry-gallery clearfix">

        </div>

        <header class="entry-header">
            <?php

                if ( is_single() || is_page() ) :
                    the_title( '<h1 class="entry-title">', '</h1>' );
                else :
                    the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
                endif;
            ?>

            <div class="entry-meta">
                <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
                <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'liguebn' ), __( '1 Comment', 'liguebn' ), __( '% Comments', 'liguebn' ) ); ?></span>
                <?php endif; ?>

                <?php edit_post_link( __( 'Edit', 'liguebn' ), '<span class="edit-link">', '</span>' ); ?>
            </div><!-- .entry-meta -->
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
                /* translators: %s: Name of current post */
                the_content( sprintf(
                    __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'liguebn' ),
                    the_title( '<span class="screen-reader-text">', '</span>', false )
                ) );

                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'liguebn' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>
        </div><!-- .entry-content -->

        <?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
    </article><!-- #post-## -->
</div>
