<?php
 /**
 * Template Name: Comments-page
 */

get_header(); ?>

	<div id="primary" class="site-content ">
		<div id="content" role="main">

			<?php
global $wpdb;
$max = '50'; // -1 для вывода всех комментариев
$result = '';
$sql  = "SELECT c.*, p.post_title FROM $wpdb->comments c INNER JOIN $wpdb->posts p ON (c.comment_post_id = p.ID) ";
$sql .= "WHERE comment_approved = '1' ";
$sql .= "AND comment_type not in ('trackback', 'pingback') ";
$sql .= "AND p.post_status != 'trash' ";
$sql .= "ORDER BY comment_date DESC";
if ('-1' != $max)
$sql .= " LIMIT 0, $max";
$results = $wpdb->get_results($sql);
$templates = "\t" . '<div style="margin-bottom:20px">%gravatar% <a href="%authorurl%">%authorname%</a> в посте <a href="%posturl%#comment-%commentid%">%posttitle%</a> <br/>%commentcontent%</div>' . "\n";
foreach ($results as $row) {
$tags = array(
'%commentdate%', '%gravatar%', '%posttitle%', 
'%posturl%', '%authorurl%', '%authorname%', 
'%commentid%', '%commentcontent%'
);
$replacements = array(
$row->comment_date, get_avatar($row->comment_author_email, '30'), $row->post_title, 
get_permalink($row->comment_post_ID), $row->comment_author_url, $row->comment_author, 
$row->comment_ID, $row->comment_content
);
$result .= str_replace($tags, $replacements, $templates);
}
if ($result)
$result = '<div id="all-testimonials">' . "\n" . $result . '</div>' . "\n";
// output
echo $result;
?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>