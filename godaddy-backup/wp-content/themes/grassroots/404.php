<?php
/**
 * 404 Not Found
 *
 * This file will display when the 404 not found error is returned
 *
* @package WordPress
* @subpackage Grassroots
* @since 1.0.0
*/

get_header(); ?>

	<div id="content" class="site-content" role="main">
		
		<article class="clearfix not-found">
			
			<h1 class="page-title"><?php _e( 'Not Found', 'grassroots' ); ?></h1>

			<p><?php _e( 'It looks like nothing was found at this location. You can try searching for it below.', 'grassroots' ); ?></p>
			
			<?php get_search_form(); ?>
			
		</article>

	</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>