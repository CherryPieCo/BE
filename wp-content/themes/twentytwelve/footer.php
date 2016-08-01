<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->

</div><!-- #page -->
  <footer id="colophon" role="contentinfo">
   <div class="footer-block">
      <?php wp_nav_menu(array(
      'theme_location' => 'footer-menu', // расположение меню в теме 
      'menu' => 'menu-footer', // название меню
      //'container' => 'div', // контейнер для меню, по умолчанию 'div', в нашем случае ставим 'nav', пустая строка - нет контейнера
      //'container_class' => '', // класс для контейнера
      //'container_id' => 'footer-menu', // id для контейнера
      //'menu_class' => '', // класс для меню
      //'menu_id' => ''// id для меню
    )); ?>
    <!--<div class="paypal"></div>-->
    </div>
  </footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>