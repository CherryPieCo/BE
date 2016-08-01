<?php
/**
 * Template Name: order
 */


get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
    <ul>
        <li>
            <label for="contactName">Name:</label>
            <input type="text" name="contactName" id="contactName" value="" />
        </li>
        <li>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="" />
        </li>
        <li>
            <label for="commentsText">Message:</label>
            <textarea name="comments" id="commentsText" rows="20" cols="30"></textarea>
        </li>
        <li>
            <button type="submit">Send email</button>
        </li>
    </ul>
    <input type="hidden" name="submitted" id="submitted" value="true" />
</form>
	

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>