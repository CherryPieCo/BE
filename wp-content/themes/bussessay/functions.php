<?php
//загружаемые стили и скрипты

function load_style_script(){

wp_enqueue_script('jquery_1', get_template_directory_uri().'/js/jquery-1.11.1.js');
wp_enqueue_script('jquery_2', get_template_directory_uri().'/js/jquery-2.1.1.js');
wp_enqueue_style('style',get_template_directory_uri().'/style.css');

}

add_action( 'wp_enqueue_scripts', 'load_style_script');

register_nav_menus(array(
  'header-menu' => 'Меню в header',  
  'footer-menu' => 'Меню в footer'
));



?>
