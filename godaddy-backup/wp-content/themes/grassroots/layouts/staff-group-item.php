<?php
/**
 * Staff Group Item
 *
 * This displays an individual staff member when viewing
 * a list of staff
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
	
	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'staff-thumbnail' ); ?></a>	
		
	<div class="staff-entry">
	
		<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		
		<?php if ( get_post_meta($post->ID, "title", $single = true ) != "" ) { ?>
			
			<p class="job-title"><?php echo get_post_meta($post->ID, "title", TRUE); ?></p>
		
		<?php } ?>
		
	</div>
			
</article>