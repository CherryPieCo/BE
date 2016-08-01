<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<div id="ya-share" class="yashare-auto-init" data-yashareL10n="ru"data-yashareQuickServices="facebook,twitter,gplus" data-yashareTheme="counter"> </div> 
				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
					<?php comments_template( '', true ); ?>
				</nav><!-- .nav-single -->
					<!--<a id="pyo" href="<?php echo get_home_url(); ?>">Place you order <div class="easy">It's Easy and Free</div></a>-->
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<!--
<div class="block-home" id="side-bottom">

<h2 class="entry-title" id="title-home" >Our Top Writers</h2>

<div id="top-authors">

<?php if (function_exists('top_authors')) top_authors(6); ?>


</div>

<div id="single-comment">

<?php recent_comments_remak (1, 50); ?>
<?//php if (function_exists('dp_recent_comments')) dp_recent_comments(); ?>


</div>
<a id="testim" href="<?php echo get_permalink(154); ?>">all testimonials</a>
<a id="pyo" href="<?php echo get_home_url(); ?>">Place you order <div class="easy">It's Easy and Free</div></a>
</div>
-->

<?php get_footer(); ?>