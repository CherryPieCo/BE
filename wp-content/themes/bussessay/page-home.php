<?php
/*
Template Name: page-home
*/
?>
<?php get_header(); ?>

<div id="image-top" >  </div>
<div id="container">
<h1> Головна </h1>


<?php $query1 = new WP_Query('page_id=41'); // страница с id 28 
while($query1->have_posts()) $query1->the_post(); ?>   
<h2 class="entry-title"><?php the_title(); ?></h2>
 <div class="entry-content"> 
<?php the_content(); ?> 
</div> <?php wp_reset_query(); ?>   
<?php 

// Цикл 2 
$query2 = new WP_Query('page_id=43'); // страница с id 35 
while($query2->have_posts()) $query2->the_post(); ;?>  
 <h2 class="entry-title"><?php the_title(); ?></h2> 
 <div class="entry-content"> <?php the_content(); ?> 
 </div> <?php wp_reset_query(); ?>



<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php the_content(); ?>

<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>

<?//php get_sidebar(); ?>
</div>


<?php get_footer(); ?>