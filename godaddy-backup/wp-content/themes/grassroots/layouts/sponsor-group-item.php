<?php
/**
 * Sponsor Group Item
 *
 * This displays an individual sponsor member when viewing
 * a list of sponsors
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
	
	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'sponsor-medium' ); ?></a>	
	
	<h2 class="sponsor-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			
</article>