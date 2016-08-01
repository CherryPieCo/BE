<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

<div class="block-home">
<?php // Цикл 1 
$query1 = new WP_Query('page_id=105'); // сторінка з id 105 
while($query1->have_posts()) $query1->the_post(); ;?> 
<div class="once-home">
 <div class="entry-content"> <?php the_content(); ?> </div> 
</div>
<?php wp_reset_query(); ?>   
<?php // Цикл 2
$query1 = new WP_Query('page_id=41'); 
while($query1->have_posts()) $query1->the_post(); ;?> 
<div class="once-home" id="whychoose">  
<h2 class="entry-title" ><?php the_title(); ?></h2> 
<div class="entry-content"> <?php the_content(); ?> </div> 
</div>
<?php wp_reset_query(); ?>   
<?php // Цикл 3 
$query2 = new WP_Query('page_id=43'); 
while($query2->have_posts()) $query2->the_post(); ;?> 
<div class="once-home" id="currentactivity">  
<h2 class="entry-title"><?php the_title(); ?></h2>
<div class="entry-content"> <?php the_content(); ?> </div>
<div class="follow">
<span>Follow Us</span>
<div class="share42init" data-url="<?php the_permalink() ?>" data-title="<?php the_title() ?>"></div>
</div>
</div>
<?php wp_reset_query(); ?>
</div>


<!--
<div class="block-home" id="">

<h2 class="entry-title" id="title-home" >Our Top Writers</h2>

<div id="top-authors">

<?php if (function_exists('top_authors')) top_authors(6); ?>


</div>

<div id="single-comment">

<?php recent_comments_remak (1, 150); ?>

<?//php if (function_exists('dp_recent_comments')) dp_recent_comments(); ?>


</div>
<a id="testim" href="<?php echo get_permalink(154); ?>">all testimonials</a>
<a id="pyo" href="<?php echo get_home_url(); ?>">Place you order <div class="easy">It's Easy and Free</div></a>
</div>
-->



<div class="block-home" id="when_ask">
<?php // Стаття Знизу
$query2 = new WP_Query('page_id=74'); // страница с id 35 
while($query2->have_posts()) $query2->the_post(); ;?>   
<h2 class="entry-title" id="title-home"><?php the_title(); ?></h2>
<div class="entry-content"> <?php the_content(); ?> </div> 
<?php wp_reset_query(); ?>
<!--<a id="pyo" href="<?php echo get_home_url(); ?>">Place you order <div class="easy">It's Easy and Free</div></a>-->
</div>

<div class="block-home" id="">
<h2 class="entry-title" id="title-home" >News and Blogs</h2>
<div class="read">
<span>Read</span><?php wp_list_categories( 'include=5&title_li=' ); ?>
<span>Read all</span><?php wp_list_categories( 'include=6&title_li=' ); ?>
</div>

<div class="news_blogs">
<?php query_posts('cat=1&showposts=9'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="preview">
<?php
        if ( has_post_thumbnail() ) { ?>
        <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
        
        <?php } else { ?>
            // миниатюры нет
     <?php  } ?> 
<div class="prew-post">
<div><?php the_date(); ?></div>
<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>

<div><?php the_excerpt();?>
<?php //the_category(); ?>
<!--p></p--></div>
</div>
</div>
<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>
</div>
</div>


<?php // Chat
$query2 = new WP_Query('page_id=5'); // страница с id 35 
while($query2->have_posts()) $query2->the_post(); ;?>   
<?php the_content(); ?>
<?php wp_reset_query(); ?>




		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>