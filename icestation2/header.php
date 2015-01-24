<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Ice Station
 * @since Ice Station 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="google-site-verification" content="dXOHVVUQX48GaScJ1ZpT_mQSi9fXhbclQn2FtLjsN-Q" />
        
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta name="description" content="">
        
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css">
    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,700' rel='stylesheet' type='text/css'>
    <script src="<?php bloginfo('template_directory'); ?>/js/responsive-nav.js"></script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

<!--HEADER-->
<div class="wrapper header-container">
    <header>
        <div class="head-wrap">
            <h1 class="site-title">
                <a href="<?php echo get_option('home'); ?>">Ice Station</a>
            </h1>
            <nav id="nav">
                <?php wp_nav_menu( array('menu_class' => 'nav', 'container' => 'false' )); ?>
            </nav>
        </div>
    </header>
</div>
<!--END HEADER-->