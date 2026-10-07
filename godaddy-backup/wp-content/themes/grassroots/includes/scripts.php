<?php

/**
 * This file registers and enqueues our
 * various scripts in the theme
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 *
 */

	// Register Scripts
		function organizedthemes_script_register() {
			if( !is_admin()){
				wp_register_script('slicknav', get_template_directory_uri() . '/js/slicknav.js', array('jquery'), NULL, true );
				wp_register_script('wallpaper', get_template_directory_uri() . '/js/wallpaper.js', array('jquery'), NULL, false );
				wp_register_script('slick', get_template_directory_uri() . '/js/slick.js', array('jquery'), NULL, false );
			}
		}
		add_action('init', 'organizedthemes_script_register');
	
	
	// Load other scripts on all pages
		function organizedthemes_load_default_scripts() {
			if( !is_admin() ) {
			
			   wp_enqueue_script('slicknav');
			   wp_enqueue_script('wallpaper');
			   wp_enqueue_script('slick');
			
			}
		}
		add_action('wp_enqueue_scripts', 'organizedthemes_load_default_scripts');
	
	
	// Conditionally load mega menu and comment-reply scripts
		function organizedthemes_conditional_script_loading() {
					
			if ( is_singular( array( 'post' ) ) ) {
			
				wp_enqueue_script( 'comment-reply' );
			
			}
			
		}
		add_action('wp_enqueue_scripts', 'organizedthemes_conditional_script_loading');
	
	
	// add ie conditional html5 and responsive shims to header
		function organizedthemes_ie_shim () {
			
			    echo '<!--[if lt IE 9]>';
			    echo '<script src="'.get_template_directory_uri().'/js/html5.js"></script>';
			    echo '<script src="'.get_template_directory_uri().'/js/respond.js"></script>';
			    echo '<![endif]-->';
			
		}
		add_action('wp_head', 'organizedthemes_ie_shim');
	
	
	// Load Stylesheet
		function organizedthemes_load_stylesheets() {
		
			wp_enqueue_style( 'main', get_stylesheet_uri(), false, GRASSROOTS_VERSION, 'screen' );
			
		}	
		add_action( 'wp_enqueue_scripts', 'organizedthemes_load_stylesheets', 60 );
		

// Theme Meta Generator
		
		if ( ! function_exists( 'grassroots_meta_generator' ) ):
		
			function grassroots_meta_generator() {
				
			echo '<meta name="generator" content="Grassroots Theme Version '.GRASSROOTS_VERSION.'" />
				
				';
				
			}
	
		endif;
		
		add_action( 'tha_head_bottom', 'grassroots_meta_generator', 1 );


// Favicons
			
		function grassroots_favicons() {
			
			 if ( of_get_option( 'favicon', $single = true ) != "" ) {
				echo '<link rel="shortcut icon" href="'. of_get_option('favicon') .'" type="image/x-icon" />
				';
			 }
			
			if ( of_get_option( 'apple', $single = true ) != "") {
				echo '<link rel="apple-touch-icon-precomposed" href="'. of_get_option('apple') .'" />
				';
			}	
		
		}	
		add_action( 'wp_head', 'grassroots_favicons', 50 );
