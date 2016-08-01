<div id="footer">
	<div id="container">
		<?php wp_nav_menu(array(
  		'theme_location' => 'footer-menu', // расположение меню в теме 
  		'menu' => 'menu-footer', // название меню
  		'container' => 'div', // контейнер для меню, по умолчанию 'div', в нашем случае ставим 'nav', пустая строка - нет контейнера
  		'container_class' => '', // класс для контейнера
  		'container_id' => 'footer-menu', // id для контейнера
  		'menu_class' => '', // класс для меню
  		'menu_id' => ''// id для меню
		)); ?>
	</div>
</div>


		<?php wp_footer(); ?>
</body>
</html>


