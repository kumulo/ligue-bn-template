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
                <?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span><!-- .entry-footer -->' ); ?>
            </header><!-- .entry-header -->
            <footer class="entry-footer">
                <div class="num">#<?php echo get_field( 'numero_adherent' ) ?></div>
                <div class="annee">Saison <?php echo get_field( 'saison' ) ?></div>
            </footer>

            <div class="entry-content">
                <?php the_content(); ?>
                <h2>Palmarès</h2>
                <?php if ( get_field('palmares') ) : ?>
                <ul class="palmares clearfix">
                    <?php foreach(get_field('palmares') as $coupe) : ?>
                    <li class="element">
                        <span class="icon"><?php echo wp_get_attachment_image($coupe['icone']['ID'], false); ?></span>
                        <span class="titre"><?php echo $coupe['titre']; ?></span>
                        <span class="annee"><?php echo $coupe['annee']; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php else : ?>
                Cette étagère est encore vide !
                <?php endif; ?>
                <h2>Distinctions</h2>
                <?php if ( get_field('informations') ) : ?>
                <ul class="palmares clearfix">
                    <?php foreach(get_field('informations') as $coupe) : ?>
                    <li class="element">
                        <span class="icon"><?php echo wp_get_attachment_image($coupe['icone']['ID'], false); ?></span>
                        <span class="titre"><?php echo $coupe['titre']; ?></span>
                        <span class="annee"><?php echo $coupe['annee']; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php else : ?>
                Cette étagère est encore vide !
                <?php endif; ?>
            </div><!-- .entry-content -->
        </div>
    </div>
    <div class="equipes clearfix">
        <?php
        if(get_field('equipes') || get_field('equipes_coupe') || get_field('equipes_old') || get_field('equipes_db')): ?>
        <header class="entry-header">
            <h2 class="entry-title">Equipes coachées</h2>
        </header>
        <?php if(get_field('equipes')): ?>
        <ul class="elements clearfix">
        <?php foreach(get_field('equipes') as $equipe): ?>
            <li class="element team">
                <div class="team-compet"><?php echo get_the_title( $equipe['competition']->ID ); ?></div>
                <h3 class="team-name"><?php echo get_the_title( $equipe['franchise']->ID ); ?></h3>
                <div class="team-logo">
                <?php
                    // Post thumbnail.
                    echo get_the_post_thumbnail($equipe['franchise']->ID, 'team-logo');
                ?>
                </div>
                <div class="team-position"><?php echo $equipe['classement']; ?></div>
            </li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php if(get_field('equipes_coupe')): ?>
        <ul class="elements clearfix">
        <?php foreach(get_field('equipes_coupe') as $equipe): ?>
            <li class="element team">
                <div class="team-compet"><?php echo get_the_title( $equipe['competition']->ID ); ?></div>
                <h3 class="team-name"><?php echo get_the_title( $equipe['franchise']->ID ); ?></h3>
                <div class="team-logo">
                <?php
                    // Post thumbnail.
                    echo get_the_post_thumbnail($equipe['franchise']->ID, 'team-logo');
                ?>
                </div>
                <div class="team-position"><?php echo $equipe['classement']; ?></div>
            </li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php if(get_field('equipes_old')): ?>
        <ul class="elements clearfix">
        <?php foreach(get_field('equipes_old') as $equipe): ?>
            <li class="element team">
                <div class="team-compet"><?php echo get_the_title( $equipe['competition']->ID ); ?></div>
                <h3 class="team-name"><?php echo get_the_title( $equipe['franchise']->ID ); ?></h3>
                <div class="team-logo">
                <?php
                    // Post thumbnail.
                    echo get_the_post_thumbnail($equipe['franchise']->ID, 'team-logo');
                ?>
                </div>
                <div class="team-position"><?php echo $equipe['classement']; ?></div>
            </li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php if(get_field('equipes_db')): ?>
        <ul class="elements clearfix">
        <?php foreach(get_field('equipes_db') as $equipe): ?>
            <li class="element team">
                <div class="team-compet"><?php echo get_the_title( $equipe['competition']->ID ); ?></div>
                <h3 class="team-name"><?php echo get_the_title( $equipe['franchise']->ID ); ?></h3>
                <div class="team-logo">
                <?php
                    // Post thumbnail.
                    echo get_the_post_thumbnail($equipe['franchise']->ID, 'team-logo');
                ?>
                </div>
                <div class="team-position"><?php echo $equipe['classement']; ?></div>
            </li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php endif; ?>
    </div>

</article><!-- #post-## -->
