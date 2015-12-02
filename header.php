<?php
/**
 * The template for displaying the header
 *
 * @package WordPress
 * @subpackage Ligue_BN
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

    <header id="masthead" class="site-header" role="banner">
	   <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>
        <div class="site-branding clearfix">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo.svg" class="logo" alt="<?php bloginfo( 'name' ); ?>" />
            <?php
                if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php endif;

                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                    <p class="site-description"><?php echo $description; ?></p>
                <?php endif;
            ?>
        </div><!-- .site-branding -->
        <button class="ui secondary-toggle">
            <i class="sidebar icon"></i>
        </button>
        <!-- <div class="ui action left icon input">
          <i class="search icon"></i>
          <input name="s" type="text" placeholder="">
          <div class="ui button">Rechercher</div>
        </div>-->
    </header><!-- .site-header -->


	<div class="clearfix" id="nav-context">
    <nav id="navigation" class="ui sidebar">
        <?php wp_nav_menu(array(
            'menu_class' => 'ui vertical menu inverted clearfix'
        )); ?>
    </nav>
    <div class="pusher">
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
