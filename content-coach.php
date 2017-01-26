<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Ligue_BN
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
    <div class="clearfix">
        <div class="left-part">
        <?php
            // Post thumbnail.
            the_post_thumbnail('coach-thumbnails');
        ?>
        </div>
        <div class="right-part">
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->
            <footer class="entry-footer">
                <div class="num">#<?php echo get_field( 'numero_adherent' ) ?></div>
                <div class="annee">Saison <?php echo get_field( 'saison' ) ?></div>
            </footer>

            <div class="entry-content">
                <?php the_content(); ?>
                <?php if ( get_field('palmares') ) : ?>
                <h2>Palmarès</h2>
                <ul class="palmares clearfix">
                    <?php foreach(get_field('palmares') as $coupe) : ?>
                    <li class="element">
                        <span class="icon"><?php echo wp_get_attachment_image($coupe['icone'], false); ?></span>
                        <span class="titre"><?php echo $coupe['titre']; ?></span>
                        <span class="annee"><?php echo $coupe['annee']; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span><!-- .entry-footer -->' ); ?>
            </div><!-- .entry-content -->
        </div>
    </div>
    <div class="equipes clearfix">
        <?php
        $args = array(
            'post_type' => 'equipe',
            'meta_query' => array(
                array(
                    'key' => 'coach', // name of custom field
                    'value' => get_the_ID()
                )
            )
        );
        $equipes = get_posts( $args );
        if($equipes): ?>
        <ul>
        <?php foreach($equipes as $equipe): ?>
            <li><?php echo get_the_title( $equipe->ID ); ?></li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>

</article><!-- #post-## -->
