<?php
/**
 * The template for displaying Author bios
 *
 * @package WordPress
 * @subpackage Ligue_BN
 */
?>

<div class="author-info">
	<h2 class="author-heading"><?php _e( 'Published by', 'liguebn' ); ?></h2>

	<div class="author-description clearfix">
        <div class="author-avatar">
            <?php
            /**
             * Filter the author bio avatar size.
             *
             * @since Twenty Fifteen 1.0
             *
             * @param int $size The avatar height and width size in pixels.
             */
            $author_bio_avatar_size = apply_filters( 'twentyfifteen_author_bio_avatar_size', 56 );

            echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
            ?>
        </div><!-- .author-avatar -->
		<h3 class="author-title"><?php echo get_the_author(); ?></h3>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p><!-- .author-bio -->

	</div><!-- .author-description -->
    <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
        <?php printf( __( 'View all posts by %s', 'liguebn' ), get_the_author() ); ?> <i class="arrow circle outline right icon"></i>
    </a>
</div><!-- .author-info -->
