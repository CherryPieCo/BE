
<?php get_header(); ?>
---------------------------------
<br>

<div id="image-top" >  </div>







<div id="content"><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<h1> Головна </h1>
<?php the_content(); ?>

<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>

<?//php get_sidebar(); ?>
</div>


<?php get_footer(); ?>