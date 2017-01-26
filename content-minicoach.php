<?php
/**
 * The template for displaying link post formats
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Ligue_BN
 */
?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="coach-thumnail">
        <?php
            // Post thumbnail.
            the_post_thumbnail('coach-thumbnails');
        ?>
    </div>

	<header class="coach-header">
		<?php
			if ( is_single() ) :
				the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header>
	<!-- .entry-header -->

</li><!-- #post-## -->
