<?php
/**
 * Creates our pagination
 *
 * It makes a query to see if it's needed
 * and then creates pagintion if necessary
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 *
 *
 */

	global $wp_query; 
	
	if ($wp_query->max_num_pages > 1) { ?>
	
	<div class="paging">
		<?php
			$big = 999999999; // need an unlikely integer
	
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages,
				'prev_text'    => __('', 'grassroots'),
				'next_text'    => __('', 'grassroots')
			 ) );
			?>
	</div><!-- .paging -->
	
<?php }