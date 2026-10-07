<?php
/**
 * The built-in Title generator
 *
 * Taken from the TwentyThirteen Theme
 * Use WordPress SEO Plugin instead
 *
 * @package 	WordPress
 * @subpackage 	Organized Themes
 * @version   	1.3.0
 */

	function organizedthemes_wp_title( $title, $sep ) {
		global $paged, $page;
	
		if ( is_feed() )
			return $title;
	
		// Add the site name.
		$title .= get_bloginfo( 'name' );
	
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
	
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'organizedthemes' ), max( $paged, $page ) );
	
		return $title;
	}
	add_filter( 'wp_title', 'organizedthemes_wp_title', 10, 2 );