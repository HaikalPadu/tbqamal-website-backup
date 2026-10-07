<?php

/**
 * Adds additional classes to the body tag
 *
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 *
 *
 */

// Add browser to body tag 
	function organizedthemes_browser_body_class($classes) {
	
	    global $is_gecko, $is_IE, $is_opera, $is_safari, $is_chrome;
	
	    if($is_gecko)      $classes[] = 'gecko';
	    elseif($is_opera)  $classes[] = 'opera';
	    elseif($is_safari) $classes[] = 'safari';
	    elseif($is_chrome) $classes[] = 'chrome';
	    elseif($is_IE)     $classes[] = 'ie';
	    else               $classes[] = 'unknown';
	
if ((
			! empty($_REQUEST['rest_route']) && strpos($_REQUEST['rest_route'], '/wp/v2/widget-types') !== false ) ||
			(! empty($_REQUEST['_locale']) && $_REQUEST['_locale'] === 'user')
		) {
			$classes[] = 'grassroots-block-editor';
		} else {
			$classes[] = 'grassroots-front';
		}
	    return $classes;
	
	}
	add_filter('body_class','organizedthemes_browser_body_class');

// Add category name to single posts
	function organizedthemes_category_single($classes) {
	
		if ( is_single() ) {
			global $post;
			foreach((get_the_category($post->ID)) as $category) {
				$classes[] = $category->category_nicename;
			}
		}
		
		return $classes;
		
	}
	add_filter('body_class','organizedthemes_category_single');

// Default page layout
	function organizedthemes_default_layout($classes) {
		
		global $post;
		
		// add layout to classes
		if ( ( is_single() || is_page() || is_singular( 'product' ) ) && get_post_meta($post->ID, "page_layout", $single = true) != "default" ) {
			
			$classes[] = get_post_meta($post->ID, "page_layout", TRUE);
			
		} else {
		
			$classes[] = of_get_option('default_layout','');
		
		}
		
		// return the $classes array
		return $classes;
	}
	add_filter('body_class','organizedthemes_default_layout');


// Hero class to pages that use the hero section
	function organizedthemes_add_hero($classes) {
		
		global $post;
		
		if ( ( ( is_single() || is_page() ) && get_post_meta($post->ID, "hero_type", $single = true) != "" ) || ( is_home() && ( get_post_meta( get_option( 'page_for_posts' ), "hero_type", $single = true ) != "" ) ) ) {
			
			$classes[] = 'hero';
			
		}
		
		// return the $classes array
		return $classes;
	}
	add_filter('body_class','organizedthemes_add_hero');