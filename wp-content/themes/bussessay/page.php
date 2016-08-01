<?php get_header(); ?>
<div id="container">
	


	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<h3><?php the_title(); ?></h3>
<?php the_content(); ?>

<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>




</div>

<?//php get_sidebar(); ?>

<?php get_footer(); ?>