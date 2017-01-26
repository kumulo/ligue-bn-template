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
    <a href="<?php echo esc_url( get_permalink() ); ?>">
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
                    the_title( '<h2 class="entry-title">', '</h2>' );
                endif;
            ?>
        </header>
        <footer class="coach-metas">
            <span class="num">#<?php echo get_field( 'numero_adherent' ) ?></span>
            <span class="annee">Saison <?php echo get_field( 'saison' ) ?></span>
        </footer>
	<!-- .entry-header -->
    </a>
</li><!-- #post-## -->
