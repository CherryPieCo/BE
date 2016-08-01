<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page">

<div id="header">
	
<div id="container">
	
<div id="logo">
		<a href="<?php echo get_option('home'); ?>/"><img width="196" src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>"></a>
</div>

<div id=nav-head-menu>
<?php wp_nav_menu(array(
  'theme_location' => 'header-menu'
  
)); ?>

<div class = "login_form">
<a href = "<?php echo home_url(); ?>/wp-login.php">SING IN</a>
<a href = "<?php echo get_settings('siteurl') . '/wp-login.php?action=register'?>">REGISTRATION</a>

</div>
</div>

</div>
	


</div>

