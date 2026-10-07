<?php
/**
 * Custom Post Type Styles.
 *
 * Adds necessary style support for
 * custom post types to the admin.
 *
 * @package WordPress
 * @subpackage Elite
 * @since 1.0.0
 *
 *
 */

// enqueue style	
	function organizedthemes_post_type_styles() {
	        wp_register_style( 'post-style', get_template_directory_uri() . '/includes/post-types/admin.css', false, '1.0.0' );
	        
	        wp_enqueue_style( 'post-style' );
	}
	add_action( 'admin_enqueue_scripts', 'organizedthemes_post_type_styles' );