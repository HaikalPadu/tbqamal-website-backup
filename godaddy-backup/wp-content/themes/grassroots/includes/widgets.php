<?php

/**
 * This registers our widget areas
 * and sets a few widget related options
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 *
 */

// Register Widgets
	add_action( 'init', 'organizedthemes_sidebars' );
	
	function organizedthemes_sidebars() {
		
		register_sidebar( array(
			'name' => __('Default Sidebar', 'grassroots'),
			'id' => 'sidebar_default',
			'description' => __('This sidebar will be used on all inside pages unless one of the more specific ones below is active.', 'grassroots'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</aside>
			
			',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

		register_sidebar( array(
			'name' => __('Home One', 'grassroots'),
			'id' => 'home_1',
			'description' => __('First section of the home page.', 'grassroots'),
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</div>
			
			',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Two', 'grassroots'),
			'id' => 'home_2',
			'description' => __('Second section of the home page.', 'grassroots'),
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</div>
			
			',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Three', 'grassroots'),
			'id' => 'home_3',
			'description' => __('Third section of the home page.', 'grassroots'),
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</div>
			
			',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Four', 'grassroots'),
			'id' => 'home_4',
			'description' => __('Four section of the home page.', 'grassroots'),
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</div>
			
			',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Five', 'grassroots'),
			'id' => 'home_5',
			'description' => __('Fifth section of the home page.', 'grassroots'),
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</div>
			
			',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Six', 'grassroots'),
			'id' => 'home_6',
			'description' => __('Sixth section of the home page.', 'grassroots'),
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</div>
			
			',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Seven', 'grassroots'),
			'id' => 'home_7',
			'description' => __('Seventh section of the home page.', 'grassroots'),
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</div>
			
			',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Eight', 'grassroots'),
			'id' => 'home_8',
			'description' => __('Eighth section of the home page.', 'grassroots'),
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</div>
			
			',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Nine', 'grassroots'),
			'id' => 'home_9',
			'description' => __('Ninth section of the home page.', 'grassroots'),
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</div>
			
			',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Home Ten', 'grassroots'),
			'id' => 'home_10',
			'description' => __('Tenth section of the home page.', 'grassroots'),
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</div>
			
			',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
		register_sidebar( array(
			'name' => __('Footer', 'grassroots'),
			'id' => 'footer_sidebar',
			'description' => __('Adds widgets to the footer.', 'grassroots'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</aside>
			
			',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
	}

// Adds shortcode support to text widgets
	add_filter('widget_text', 'do_shortcode');

// remove inline styling from recent comments widget
	function organizedthemes_remove_recent_comments_style() {
		global $wp_widget_factory;
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
	add_action( 'widgets_init', 'organizedthemes_remove_recent_comments_style' );

// disable calendar 
	function unregister_default_wp_widgets() {
	  unregister_widget('WP_Widget_Calendar');
	}
	add_action('widgets_init', 'unregister_default_wp_widgets', 1);

