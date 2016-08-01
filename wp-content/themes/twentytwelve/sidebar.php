<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
<!--
		<div class="order-form-sidebar">
		<?php
		
		$query2 = new WP_Query('page_id=143'); // страница с id 35 
		while($query2->have_posts()) $query2->the_post(); ;?>   
		<div class="entry-content"> <?php the_content(); ?> </div> 
		<?php wp_reset_query(); ?>
	</div>		
-->

			<ul>
				<?php $the_query = new WP_Query( 'posts_per_page=3&cat=1' ); ?>
				<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
				<li style="margin-bottom:10px;"><a href=<?php the_permalink() ?>><?php the_post_thumbnail(); ?></a></li>
				<li style="margin-bottom:10px;"><a href=<?php the_permalink() ?>><?php the_title(); ?></a></li>
				<li style="margin-bottom:20px;"><?php echo wp_trim_words( get_the_content(), $num_words = 15, $more = null ); ?></li>
				<?php
				endwhile;
				wp_reset_postdata();
				?>
			</ul>



<?php //print_r($GLOBALS); 
if( $_SERVER['REQUEST_URI'] != '/blog/' || true) { ?>
			<aside id="whcu" class="widget">   
				<h3 class="widget-title">Our services</h3>
				<div class="entry-content">
					<?php 
						//if(wp_nav_menu('menu=23')) wp_nav_menu('menu=23'); 
						$menu = wp_nav_menu(
						    array(
						        'echo' => FALSE,
						        'fallback_cb' => '__return_false',
						        'menu' => '23'
						    )
						);

						if ( ! empty ( $menu ) )
						{
						    echo '<div class="navmain2">' . $menu . '</div>';
						}
					?>


				</div>
			</aside>
<?php } ?>
			<?php // Цикл 1 
			$query1 = new WP_Query('page_id=41'); // страница с id 28 
			while($query1->have_posts()) $query1->the_post(); ;?>
			<aside class="widget" id="whcu">   
			<h3 class="widget-title"><?php the_title(); ?></h3>
			<div class="entry-content"> <?php the_content(); ?> </div>
			</aside> 
			<?php wp_reset_query(); ?>  

			<?php dynamic_sidebar( 'sidebar-1' ); ?>

			<aside class="widget" id="follow-side">
				<div class="follow">
					<span>Follow Us</span>
					<div class="share42init" data-url="<?php the_permalink() ?>" data-title="<?php the_title() ?>"></div>
				</div>
			</aside>
			
			
		</div><!-- #secondary -->
	<?php endif; ?>

	