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
                <div class="num">BN #<?php echo get_field( 'numero_adherent' ) ?></div>
                <div class="annee"><?php the_title(); ?> est arrivé en saison <?php echo get_field( 'saison' ) ?></div>
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
                <ul class="distinctions clearfix">
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
        <?php $equipes = get_field('equipes');
        if($equipes): ?>
        <h3 class="compet-title">Saisons Ligue BN <span class="count">(<?php echo count($equipes); ?>)</span></h3>
        <ul class="elements clearfix">
        <?php foreach($equipes as $equipe): ?>
            <li class="element team">
                <div class="team-compet"><?php echo get_the_title( $equipe['competition']->ID ); ?></div>
                <div class="team-logo">
                <?php
                    // Post thumbnail.
                    if(has_post_thumbnail( $equipe['franchise']->ID )):
                        echo get_the_post_thumbnail($equipe['franchise']->ID, 'team-logo');
                    else:
                        echo '<img src="' . get_template_directory_uri() . '/dist/img/team-default.png" />';
                    endif;
                ?>
                </div>
                <h4 class="team-name"><?php echo get_the_title( $equipe['franchise']->ID ); ?></h4>
                <div class="team-compet"><?php echo $equipe['roster'] ; ?></div>
                <div class="team-position"><?php echo ($equipe['classement']) ? 'Position : '.$equipe['classement'] : '-'; ?></div>
            </li>
            <li class="sep"></li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php $equipes = get_field('equipes_coupe');
        if($equipes): ?>
        <h3 class="compet-title">Coupes BN <span class="count">(<?php echo count($equipes); ?>)</span></h3>
        <ul class="elements clearfix">
        <?php foreach($equipes as $equipe): ?>
            <li class="element team">
                <div class="team-compet"><?php echo get_the_title( $equipe['competition']->ID ); ?></div>
                <div class="team-logo">
                <?php
                    // Post thumbnail.
                    if(has_post_thumbnail( $equipe['franchise']->ID )):
                        echo get_the_post_thumbnail($equipe['franchise']->ID, 'team-logo');
                    else:
                        echo '<img src="' . get_template_directory_uri() . '/dist/img/team-default.png" />';
                    endif;
                ?>
                </div>
                <h4 class="team-name"><?php echo get_the_title( $equipe['franchise']->ID ); ?></h4>
                <div class="team-compet"><?php echo $equipe['roster'] ; ?></div>
                <div class="team-position"><?php echo ($equipe['classement']) ? 'Position : '.$equipe['classement'] : '-'; ?></div>
            </li>
            <li class="sep"></li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php $equipes = get_field('equipes_old');
        if($equipes): ?>
        <h3 class="compet-title">Oldbowl &amp; Death bowl <span class="count">(<?php echo count($equipes); ?>)</span></h3>
        <ul class="elements clearfix">
        <?php foreach($equipes as $equipe): ?>
            <li class="element team">
                <div class="team-compet"><?php echo get_the_title( $equipe['competition']->ID ); ?></div>
                <div class="team-logo">
                <?php
                    // Post thumbnail.
                    if(has_post_thumbnail( $equipe['franchise']->ID )):
                        echo get_the_post_thumbnail($equipe['franchise']->ID, 'team-logo');
                    else:
                        echo '<img src="' . get_template_directory_uri() . '/dist/img/team-default.png" />';
                    endif;
                ?>
                </div>
                <h4 class="team-name"><?php echo get_the_title( $equipe['franchise']->ID ); ?></h4>
                <div class="team-compet"><?php echo $equipe['roster'] ; ?></div>
                <div class="team-position"><?php echo ($equipe['classement']) ? 'Position : '.$equipe['classement'] : '-'; ?></div>
            </li>
            <li class="sep"></li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php $equipes = get_field('equipes_db');
        if($equipes): ?>
        <h3 class="compet-title">Tournois Dragonbowl &amp; 7 Bowl de Crystal <span class="count">(<?php echo count($equipes); ?>)</span></h3>
        <ul class="elements clearfix">
        <?php foreach(get_field('equipes_db') as $equipe): ?>
            <li class="element team">
                <div class="team-compet"><?php echo get_the_title( $equipe['competition']->ID ); ?></div>
                <div class="team-logo">
                <?php
                    // Post thumbnail.
                    if(has_post_thumbnail( $equipe['franchise']->ID )):
                        echo get_the_post_thumbnail($equipe['franchise']->ID, 'team-logo');
                    else:
                        echo '<img src="' . get_template_directory_uri() . '/dist/img/team-default.png" />';
                    endif;
                ?>
                </div>
                <h4 class="team-name"><?php echo get_the_title( $equipe['franchise']->ID ); ?></h4>
                <div class="team-compet"><?php echo $equipe['roster'] ; ?></div>
                <div class="team-position"><?php echo ($equipe['classement']) ? 'Position : '.$equipe['classement'] : '-'; ?></div>
            </li>
            <li class="sep"></li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php endif; ?>
    </div>

</article><!-- #post-## -->
