<?php get_header(); ?>

<?php query_posts('showposts=3'); 
 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<h3><?php the_title(); ?></h3>
<?php the_excerpt(); ?>

<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>

<?//php get_sidebar(); ?>

<?php get_footer(); ?>
