<?php

/**
 * Displays our lightbox if the effect
 * is selected.
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 *
 */

// Register Scripts
	function organizedthemes_lightbox_script() {
			if( !is_admin()){
				wp_register_script('lightbox', get_template_directory_uri() . '/js/lightbox/lightbox.js', array('jquery'), NULL, true );
			}
		}
		add_action('init', 'organizedthemes_lightbox_script');

// Enqueue Script
	function organizedthemes_lightbox_script_load() {
		if( !is_admin()){
			wp_enqueue_script('lightbox');
		}
	}
	add_action('wp_enqueue_scripts', 'organizedthemes_lightbox_script_load');

// register styles
	function organizedthemes_lightbox_style_retister() {
		if( !is_admin()){
		
			// lightbox styles
			wp_register_style('default', get_template_directory_uri() . '/js/lightbox/themes/default/jquery.lightbox.css', '', NULL, 'screen' );
			wp_register_style('carbono', get_template_directory_uri() . '/js/lightbox/themes/carbono/jquery.lightbox.css', '', NULL, 'screen' );
			wp_register_style('classic', get_template_directory_uri() . '/js/lightbox/themes/classic/jquery.lightbox.css', '', NULL, 'screen' );
			wp_register_style('classic_dark', get_template_directory_uri() . '/js/lightbox/themes/classic-dark/jquery.lightbox.css', '', NULL, 'screen' );
			wp_register_style('evolution', get_template_directory_uri() . '/js/lightbox/themes/evolution/jquery.lightbox.css', '', NULL, 'screen' );
			wp_register_style('evolution_dark', get_template_directory_uri() . '/js/lightbox/themes/evolution-dark/jquery.lightbox.css', '', NULL, 'screen' );
			wp_register_style('facebook', get_template_directory_uri() . '/js/lightbox/themes/facebook/jquery.lightbox.css', '', NULL, 'screen' );
			wp_register_style('minimal', get_template_directory_uri() . '/js/lightbox/themes/minimalist/jquery.lightbox.css', '', NULL, 'screen' );
			wp_register_style('minimal_dark', get_template_directory_uri() . '/js/lightbox/themes/minimalist-dark/jquery.lightbox.css', '', NULL, 'screen' );
			wp_register_style('white', get_template_directory_uri() . '/js/lightbox/themes/white-green/jquery.lightbox.css', '', NULL, 'screen' );
			
		}
	}
	add_action('init', 'organizedthemes_lightbox_style_retister');
		
// enqueue styles
	function organizedthemes_load_lightbox_styles() {
		if( !is_admin()){
			wp_enqueue_style(''.of_get_option('lightbox_style').''); 
		}
	}
	add_action('wp_enqueue_scripts', 'organizedthemes_load_lightbox_styles');	
