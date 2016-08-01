<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
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
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!--<a id= "chat" class="fancybox" href="#contact_form_pop"></a>-->
<?php // Chat
$query2 = new WP_Query('page_id=5'); // страница с id 35 
while($query2->have_posts()) $query2->the_post(); ;?>   
<?php the_content(); ?>
<?php wp_reset_query(); ?>

<div id="header-bg"></div>

<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<div class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
				</a>
			</div>
		</hgroup>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

<?php if(is_front_page ()) { ?>
		<h1 class="vadims_h1">Get your writing assignment done in 4 simple steps</h1>
<!-- 
<div class="order-form">
<?php 		
$query2 = new WP_Query('page_id=143');
while($query2->have_posts()) $query2->the_post(); ;?>   
<?php  the_content(); ?>
<?php wp_reset_query(); ?> 
</div>-->

<?php } ?>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">

