<?php

/**
 * This file attaches the theme customizer to
 * the options in the options framework
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 *
 */

add_action( 'customize_register', 'grassroots_customizer_register' );

function grassroots_customizer_register($wp_customize) {
	
	// Change section names
		$wp_customize->get_section('title_tagline')->title = __( 'Logo', 'grassroots' );
	
	// Remove tagline field
		$wp_customize->remove_control('blogdescription');
	
	// Change default priority
		$wp_customize->get_section('title_tagline')->priority = 3;
	
	/**
	 * This is optional, but if you want to reuse some of the defaults
	 * or values you already have built in the options panel, you
	 * can load them into $options for easy reference
	 */
	 
	$options = optionsframework_options();
	

// Title & Tagline
	
	// Logo Type
		$wp_customize->add_setting( 'grassroots[header_blog_title]', array(
			'default' => $options['header_blog_title']['std'],
			'type' => 'option'
		) );
	
		$wp_customize->add_control( 'grassroots_logo_select', array(
				'label' => $options['header_blog_title']['name'],
				'section' => 'title_tagline',
				'settings' => 'grassroots[header_blog_title]',
				'type' => $options['header_blog_title']['type'],
				'choices' => $options['header_blog_title']['options'],
				'priority' => 1
		) );
		
		$wp_customize->add_setting( 'grassroots[logo]', array(
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
			'label' => $options['logo']['name'],
			'section' => 'title_tagline',
			'settings' => 'grassroots[logo]',
			'priority' => 2
		) ) );
	
	// Title font face
		$wp_customize->add_setting( 'grassroots[site_title_font][face]', array(
			'default' => $options['site_title_font']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'site_title_font', array(
				'label' => $options['site_title_font']['name'],
				'section' => 'title_tagline',
				'settings' => 'grassroots[site_title_font][face]',
				'type' => 'select',
				'choices' => $options['site_title_font']['options']['faces'],
				'priority' => 3
		) );
	
	// Title Color
		$wp_customize->add_setting( 'grassroots[logo_color]', array(
			'default' => $options['logo_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logo_color', array(
			'label'   => $options['logo_color']['name'],
			'section' => 'title_tagline',
			'settings'   => 'grassroots[logo_color]',
			'priority' => 4
		) ) );
	
	// Title Color Hover
		$wp_customize->add_setting( 'grassroots[logo_color_hover]', array(
			'default' => $options['logo_color_hover']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logo_color_hover', array(
			'label'   => $options['logo_color_hover']['name'],
			'section' => 'title_tagline',
			'settings'   => 'grassroots[logo_color_hover]',
			'priority' => 5
		) ) );

// Navigation
	
	$wp_customize->add_section( 'grassroots_nav', array(
		'title' => __( 'Navigation Styles', 'grassroots' ),
		'description'	=> __( 'Set the appearance of your navigation menus.', 'grassroots' ),
		'priority' => 5
	) );
		
	// Navigation font face
		$wp_customize->add_setting( 'grassroots[navigation_font][face]', array(
			'default' => $options['navigation_font']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'navigation_font', array(
				'label' => $options['navigation_font']['name'],
				'section' => 'grassroots_nav',
				'settings' => 'grassroots[navigation_font][face]',
				'type' => 'select',
				'choices' => $options['navigation_font']['options']['faces'],
				'priority' => 10
		) );
	
	// Navigation Item Color
		$wp_customize->add_setting( 'grassroots[navigation_item]', array(
			'default' => $options['navigation_item']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_item', array(
			'label'   => $options['navigation_item']['name'],
			'section' => 'grassroots_nav',
			'settings'   => 'grassroots[navigation_item]',
			'priority' => 12
		) ) );
		
	// Navigation Item Color Hover
		$wp_customize->add_setting( 'grassroots[navigation_item_hover]', array(
			'default' => $options['navigation_item_hover']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_item_hover', array(
			'label'   => $options['navigation_item_hover']['name'],
			'section' => 'grassroots_nav',
			'settings'   => 'grassroots[navigation_item_hover]',
			'priority' => 13
		) ) );
	
	// Navigation Drop Down Background
		$wp_customize->add_setting( 'grassroots[navigation_drop_down_background]', array(
			'default' => $options['navigation_drop_down_background']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_drop_down_background', array(
			'label'   => $options['navigation_drop_down_background']['name'],
			'section' => 'grassroots_nav',
			'settings'   => 'grassroots[navigation_drop_down_background]',
			'priority' => 15
		) ) );
	
	// Navigation Drop Down Link
		$wp_customize->add_setting( 'grassroots[navigation_drop_down_color]', array(
			'default' => $options['navigation_drop_down_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_drop_down_color', array(
			'label'   => $options['navigation_drop_down_color']['name'],
			'section' => 'grassroots_nav',
			'settings'   => 'grassroots[navigation_drop_down_color]',
			'priority' => 20
		) ) );
	
	// Navigation Drop Down Link
		$wp_customize->add_setting( 'grassroots[navigation_drop_down_color_hover]', array(
			'default' => $options['navigation_drop_down_color_hover']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_drop_down_color_hover', array(
			'label'   => $options['navigation_drop_down_color_hover']['name'],
			'section' => 'grassroots_nav',
			'settings'   => 'grassroots[navigation_drop_down_color_hover]',
			'priority' => 25
		) ) );
	
	// Navigation Button
		$wp_customize->add_setting( 'grassroots[navigation_button_color]', array(
			'default' => $options['navigation_button_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_button_color', array(
			'label'   => $options['navigation_button_color']['name'],
			'section' => 'grassroots_nav',
			'settings'   => 'grassroots[navigation_button_color]',
			'priority' => 30
		) ) );
	
	// Navigation Button Hover
		$wp_customize->add_setting( 'grassroots[navigation_button_color_hover]', array(
			'default' => $options['navigation_button_color_hover']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_button_color_hover', array(
			'label'   => $options['navigation_button_color_hover']['name'],
			'section' => 'grassroots_nav',
			'settings'   => 'grassroots[navigation_button_color_hover]',
			'priority' => 35
		) ) );
	
	// Mobile Navigation Text
		$wp_customize->add_setting( 'grassroots[mobile_navigation_name]', array(
			'default' => $options['mobile_navigation_name']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'mobile_navigation_name', array(
			'label'   => $options['mobile_navigation_name']['name'],
			'section' => 'grassroots_nav',
			'settings'   => 'grassroots[mobile_navigation_name]',
			'type' => isset($options['mobile_navigation_name']) && isset($options['mobile_navigation_name']['mobile_navigation_name']) ? $options['mobile_navigation_name']['mobile_navigation_name'] : '',
			'priority' => 45
		 ) );
	
	
	
// Background
	
	$wp_customize->add_section( 'grassroots_background', array(
		'title' => __( 'Background', 'grassroots' ),
		'description'	=> __( 'Set the appearance of the site background.  The "Hero Image" at the top of each page is the featured image of that page and should be set there.', 'grassroots' ),
		'priority' => 15
	) );
	
	// background image
		$wp_customize->add_setting( 'grassroots[background_image]', array(
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'background_image', array(
			'label' => $options['background_image']['name'],
			'section' => 'grassroots_background',
			'settings' => 'grassroots[background_image]'
		) ) );
	
	// background color
		$wp_customize->add_setting( 'grassroots[background_color]', array(
			'default' => $options['background_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
			'label'   => $options['background_color']['name'],
			'section' => 'grassroots_background',
			'settings'   => 'grassroots[background_color]'
		) ) );

	// background repeat
		$wp_customize->add_setting( 'grassroots[background_repeat]', array(
				'default' => $options['background_repeat']['std'],
				'type' => 'option'
			) );
		
		$wp_customize->add_control( 'grassroots_repeat_select', array(
				'label' => $options['background_repeat']['name'],
				'section' => 'grassroots_background',
				'settings' => 'grassroots[background_repeat]',
				'type' => $options['background_repeat']['type'],
				'choices' => $options['background_repeat']['options']
		) );
	
	// background attachment
		$wp_customize->add_setting( 'grassroots[background_attachment]', array(
				'default' => $options['background_attachment']['std'],
				'type' => 'option'
			) );
		
		$wp_customize->add_control( 'grassroots_attachment_select', array(
				'label' => $options['background_attachment']['name'],
				'section' => 'grassroots_background',
				'settings' => 'grassroots[background_attachment]',
				'type' => $options['background_attachment']['type'],
				'choices' => $options['background_attachment']['options']
		) );
	
	// background horizontal position
		$wp_customize->add_setting( 'grassroots[background_position_horizontal]', array(
				'default' => $options['background_position_horizontal']['std'],
				'type' => 'option'
			) );
		
		$wp_customize->add_control( 'grassroots_horizontal_select', array(
				'label' => $options['background_position_horizontal']['name'],
				'section' => 'grassroots_background',
				'settings' => 'grassroots[background_position_horizontal]',
				'type' => $options['background_position_horizontal']['type'],
				'choices' => $options['background_position_horizontal']['options']
		) );
	
	// background vertical position
		$wp_customize->add_setting( 'grassroots[background_position_vertical]', array(
				'default' => $options['background_position_vertical']['std'],
				'type' => 'option'
			) );
		
		$wp_customize->add_control( 'grassroots_vertical_select', array(
				'label' => $options['background_position_vertical']['name'],
				'section' => 'grassroots_background',
				'settings' => 'grassroots[background_position_vertical]',
				'type' => $options['background_position_vertical']['type'],
				'choices' => $options['background_position_vertical']['options']
		) );

// Hero Section

	$wp_customize->add_section( 'grassroots_hero', array(
		'title' => __( 'Hero Section', 'grassroots' ),
		'description'	=> __( 'Choose the fonts for your hero section.', 'grassroots' ),
		'priority' => 20
	) );	

	
	// Hero Title Font
		$wp_customize->add_setting( 'grassroots[hero_title_font][face]', array(
			'default' => $options['hero_title_font']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'hero_title_font', array(
				'label' => $options['hero_title_font']['name'],
				'section' => 'grassroots_hero',
				'settings' => 'grassroots[hero_title_font][face]',
				'type' => 'select',
				'choices' => $options['hero_title_font']['options']['faces'],
				'priority' => 30
		) );
	
	// Hero Text Font
		$wp_customize->add_setting( 'grassroots[hero_text_font][face]', array(
			'default' => $options['hero_text_font']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'hero_text_font', array(
				'label' => $options['hero_text_font']['name'],
				'section' => 'grassroots_hero',
				'settings' => 'grassroots[hero_text_font][face]',
				'type' => 'select',
				'choices' => $options['hero_text_font']['options']['faces'],
				'priority' => 35
		) );


// Content Colors

	$wp_customize->add_section( 'grassroots_content', array(
		'title' => __( 'Main Content', 'grassroots' ),
		'priority' => 25
	) );	
	
	
		// Body Font
			$wp_customize->add_setting( 'grassroots[body_font][face]', array(
				'default' => $options['body_font']['std']['face'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( 'body_font', array(
					'label' => $options['body_font']['name'],
					'section' => 'grassroots_content',
					'settings' => 'grassroots[body_font][face]',
					'type' => 'select',
					'choices' => $options['body_font']['options']['faces'],
					'priority' => 5
			) );
		
		// Content Text Color
			$wp_customize->add_setting( 'grassroots[content_text]', array(
				'default' => $options['content_text']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_text', array(
				'label'   => $options['content_text']['name'],
				'section' => 'grassroots_content',
				'settings'   => 'grassroots[content_text]',
				'priority' => 10
			) ) );
		
		// Content Background Color
			$wp_customize->add_setting( 'grassroots[content_background]', array(
				'default' => $options['content_background']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_background', array(
				'label'   => $options['content_background']['name'],
				'section' => 'grassroots_content',
				'settings'   => 'grassroots[content_background]',
				'priority' => 15
			) ) );
		
		// Heading Font
			$wp_customize->add_setting( 'grassroots[heading_font][face]', array(
				'default' => $options['heading_font']['std']['face'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( 'heading_font', array(
					'label' => $options['heading_font']['name'],
					'section' => 'grassroots_content',
					'settings' => 'grassroots[heading_font][face]',
					'type' => 'select',
					'choices' => $options['heading_font']['options']['faces'],
					'priority' => 20
			) );
		
		// Heading Color
			$wp_customize->add_setting( 'grassroots[heading_color]', array(
				'default' => $options['heading_color']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_color', array(
				'label'   => $options['heading_color']['name'],
				'section' => 'grassroots_content',
				'settings'   => 'grassroots[heading_color]',
				'priority' => 25
			) ) );
		
		// Link Color
			$wp_customize->add_setting( 'grassroots[link_color]', array(
				'default' => $options['link_color']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
				'label'   => $options['link_color']['name'],
				'section' => 'grassroots_content',
				'settings'   => 'grassroots[link_color]',
				'priority' => 30
			) ) );
		
		// Link Color Hover
			$wp_customize->add_setting( 'grassroots[link_color_hover]', array(
				'default' => $options['link_color_hover']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color_hover', array(
				'label'   => $options['link_color_hover']['name'],
				'section' => 'grassroots_content',
				'settings'   => 'grassroots[link_color_hover]',
				'priority' => 35
			) ) );
		
		
		// Price Color
			$wp_customize->add_setting( 'grassroots[price_color]', array(
				'default' => $options['price_color']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'price_color', array(
				'label'   => $options['price_color']['name'],
				'section' => 'grassroots_content',
				'settings'   => 'grassroots[price_color]',
				'priority' => 50
			) ) );
		
		// Sale Background Color
			$wp_customize->add_setting( 'grassroots[sale_background]', array(
				'default' => $options['sale_background']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sale_background', array(
				'label'   => $options['sale_background']['name'],
				'section' => 'grassroots_content',
				'settings'   => 'grassroots[sale_background]',
				'priority' => 60
			) ) );
		
		// Sale Text Color
			$wp_customize->add_setting( 'grassroots[sale_text]', array(
				'default' => $options['sale_text']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sale_text', array(
				'label'   => $options['sale_text']['name'],
				'section' => 'grassroots_content',
				'settings'   => 'grassroots[sale_text]',
				'priority' => 65
			) ) );
		
	

// Footer Colors

	$wp_customize->add_section( 'grassroots_footer', array(
		'title' => __( 'Footer', 'grassroots' ),
		'priority' => 30
	) );

	// Footer Layout Style
		$wp_customize->add_setting( 'grassroots[footer_layout]', array(
			'default' => $options['footer_layout']['std'],
			'type' => 'option'
		) );
				
		$wp_customize->add_control( 'footer_layout', array(
			'label' => $options['footer_layout']['name'],
			'section' => 'grassroots_footer',
			'settings' => 'grassroots[footer_layout]',
			'type' => $options['footer_layout']['type'],
			'choices' => $options['footer_layout']['options'],
			'priority' => 1
		) );

	// Footer Columns Number
		$wp_customize->add_setting( 'grassroots[footer_col_nr]', array(
			'default' => $options['footer_col_nr']['std'],
			'type' => 'option'
		) );
				
		$wp_customize->add_control( 'footer_col_nr', array(
			'label' => $options['footer_col_nr']['name'],
			'section' => 'grassroots_footer',
			'settings' => 'grassroots[footer_col_nr]',
			'type' => $options['footer_col_nr']['type'],
			'choices' => $options['footer_col_nr']['options'],
			'priority' => 2
		) );	

	// Footer Color
		$wp_customize->add_setting( 'grassroots[footer_color]', array(
			'default' => $options['footer_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_color', array(
			'label'   => $options['footer_color']['name'],
			'section' => 'grassroots_footer',
			'settings'   => 'grassroots[footer_color]',
			'priority' => 15
		) ) );

	
	// Footer Link Color
		$wp_customize->add_setting( 'grassroots[footer_link_color]', array(
			'default' => $options['footer_link_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color', array(
			'label'   => $options['footer_link_color']['name'],
			'section' => 'grassroots_footer',
			'settings'   => 'grassroots[footer_link_color]',
			'priority' => 25
		) ) );
	
	// Footer Link Color Hover
		$wp_customize->add_setting( 'grassroots[footer_link_color_hover]', array(
			'default' => $options['footer_link_color_hover']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color_hover', array(
			'label'   => $options['footer_link_color_hover']['name'],
			'section' => 'grassroots_footer',
			'settings'   => 'grassroots[footer_link_color_hover]',
			'priority' => 30
		) ) );
	
	// Footer Background Color
		$wp_customize->add_setting( 'grassroots[footer_background_color]', array(
			'default' => $options['footer_background_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
			'label'   => $options['footer_background_color']['name'],
			'section' => 'grassroots_footer',
			'settings'   => 'grassroots[footer_background_color]',
			'priority' => 35
		) ) );


// Widgets

	$wp_customize->add_section( 'grassroots_widget', array(
		'title' => __( 'Widget Styles', 'grassroots' ),
		'priority' => 40
	) );
	
	// Widget Title Font
		$wp_customize->add_setting( 'grassroots[widget_title_font][face]', array(
			'default' => $options['widget_title_font']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'widget_title_font', array(
				'label' => $options['widget_title_font']['name'],
				'section' => 'grassroots_widget',
				'settings' => 'grassroots[widget_title_font][face]',
				'type' => 'select',
				'choices' => $options['widget_title_font']['options']['faces'],
				'priority' => 5
		) );
		
	// Widget Title Color
		$wp_customize->add_setting( 'grassroots[widget_title]', array(
			'default' => $options['widget_title']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'widget_title', array(
			'label'   => $options['widget_title']['name'],
			'section' => 'grassroots_widget',
			'settings'   => 'grassroots[widget_title]',
			'priority' => 10
		) ) );
	
	// Widget Text Color
		$wp_customize->add_setting( 'grassroots[widget_text]', array(
			'default' => $options['widget_text']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'widget_text', array(
			'label'   => $options['widget_text']['name'],
			'section' => 'grassroots_widget',
			'settings'   => 'grassroots[widget_text]',
			'priority' => 15
		) ) );
	
	// Donation Graph Base
		$wp_customize->add_setting( 'grassroots[donate_base_color]', array(
			'default' => $options['donate_base_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'donate_base_color', array(
			'label'   => $options['donate_base_color']['name'],
			'section' => 'grassroots_widget',
			'settings'   => 'grassroots[donate_base_color]',
			'priority' => 20
		) ) );
	
	// Donation Graph Progress
		$wp_customize->add_setting( 'grassroots[donate_progress_color]', array(
			'default' => $options['donate_progress_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'donate_progress_color', array(
			'label'   => $options['donate_progress_color']['name'],
			'section' => 'grassroots_widget',
			'settings'   => 'grassroots[donate_progress_color]',
			'priority' => 25
		) ) );
	
	
// Buttons

	$wp_customize->add_section( 'grassroots_buttons', array(
		'title' => __( 'Buttons', 'grassroots' ),
		'priority' => 45
	) );
	
	// Button Color
		$wp_customize->add_setting( 'grassroots[button]', array(
			'default' => $options['button']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button', array(
			'label'   => $options['button']['name'],
			'section' => 'grassroots_buttons',
			'settings'   => 'grassroots[button]',
			'priority' => 5
		) ) );
	
	// Button Background Color
		$wp_customize->add_setting( 'grassroots[button_background]', array(
			'default' => $options['button_background']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_background', array(
			'label'   => $options['button_background']['name'],
			'section' => 'grassroots_buttons',
			'settings'   => 'grassroots[button_background]',
			'priority' => 10
		) ) );
	
	// Button Hover Color
		$wp_customize->add_setting( 'grassroots[button_hover]', array(
			'default' => $options['button_hover']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_hover', array(
			'label'   => $options['button_hover']['name'],
			'section' => 'grassroots_buttons',
			'settings'   => 'grassroots[button_hover]',
			'priority' => 15
		) ) );
	
	// Button Background Hover Color
		$wp_customize->add_setting( 'grassroots[button_background_hover]', array(
			'default' => $options['button_background_hover']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_background_hover', array(
			'label'   => $options['button_background_hover']['name'],
			'section' => 'grassroots_buttons',
			'settings'   => 'grassroots[button_background_hover]',
			'priority' => 20
		) ) );
	
	
		// Alt button
			$wp_customize->add_setting( 'grassroots[alt_button]', array(
				'default' => $options['alt_button']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'alt_button', array(
				'label'   => $options['alt_button']['name'],
				'section' => 'grassroots_buttons',
				'settings'   => 'grassroots[alt_button]',
				'priority' => 40
			) ) );
		
		// Alt button background
			$wp_customize->add_setting( 'grassroots[alt_button_background]', array(
				'default' => $options['alt_button_background']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'alt_button_background', array(
				'label'   => $options['alt_button_background']['name'],
				'section' => 'grassroots_buttons',
				'settings'   => 'grassroots[alt_button_background]',
				'priority' => 45
			) ) );
		
		// Alt button hover
			$wp_customize->add_setting( 'grassroots[alt_button_hover]', array(
				'default' => $options['alt_button_hover']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'alt_button_hover', array(
				'label'   => $options['alt_button_hover']['name'],
				'section' => 'grassroots_buttons',
				'settings'   => 'grassroots[alt_button_hover]',
				'priority' => 50
			) ) );
		
		// Alt button background hover
			$wp_customize->add_setting( 'grassroots[alt_button_background_hover]', array(
				'default' => $options['alt_button_background_hover']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'alt_button_background_hover', array(
				'label'   => $options['alt_button_background_hover']['name'],
				'section' => 'grassroots_buttons',
				'settings'   => 'grassroots[alt_button_background_hover]',
				'priority' => 55
			) ) );
	
	




// Home Page
	$wp_customize->add_panel( 'panel_home_page', array(
		    'priority' => 90,
		    'capability' => 'edit_theme_options',
		    'theme_supports' => '',
		    'title' => __( 'Home Page Styles', 'grassroots' ),
		    'description' => __( 'This panel sets the colors and backgrounds for your home page sections.', 'grassroots' ),
		) );
	

// Home Block 1

	$wp_customize->add_section( 'grassroots_home_1', array(
		'title' => __( 'Home Block 1', 'grassroots' ),
		'priority' => 60,
		'description' => '',
		'panel' => 'panel_home_page',
	) );		
		
		// Home 1 Text
			$wp_customize->add_setting( 'grassroots[home_1_text]', array(
				'default' => $options['home_1_text']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_1_text', array(
				'label'   => $options['home_1_text']['name'],
				'section' => 'grassroots_home_1',
				'settings'   => 'grassroots[home_1_text]',
				'priority' => 5
			) ) );
		
		// Home 1 Link
			$wp_customize->add_setting( 'grassroots[home_1_link]', array(
				'default' => $options['home_1_link']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_1_link', array(
				'label'   => $options['home_1_link']['name'],
				'section' => 'grassroots_home_1',
				'settings'   => 'grassroots[home_1_link]',
				'priority' => 7
			) ) );
		
		// Home 1 Hover
			$wp_customize->add_setting( 'grassroots[home_1_hover]', array(
				'default' => $options['home_1_hover']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_1_hover', array(
				'label'   => $options['home_1_hover']['name'],
				'section' => 'grassroots_home_1',
				'settings'   => 'grassroots[home_1_hover]',
				'priority' => 10
			) ) );
			
		// Home 1 Background
			$wp_customize->add_setting( 'grassroots[home_1]', array(
				'default' => $options['home_1']['std'],
				'type' => 'option'
			) );
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_1', array(
				'label'   => $options['home_1']['name'],
				'section' => 'grassroots_home_1',
				'settings'   => 'grassroots[home_1]',
				'priority' => 15
			) ) );
		
			// background image
				$wp_customize->add_setting( 'grassroots[home_1_image]', array(
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_1_image', array(
					'label' => $options['home_1_image']['name'],
					'section' => 'grassroots_home_1',
					'settings' => 'grassroots[home_1_image]',
					'priority' => 20
				) ) );
		
			// background repeat
				$wp_customize->add_setting( 'grassroots[home_1_repeat]', array(
						'default' => $options['home_1_repeat']['std'],
						'type' => 'option'
					) );
				
				$wp_customize->add_control( 'grassroots_home_1_repeat', array(
						'label' => $options['home_1_repeat']['name'],
						'section' => 'grassroots_home_1',
						'settings' => 'grassroots[home_1_repeat]',
						'type' => $options['home_1_repeat']['type'],
						'choices' => $options['home_1_repeat']['options'],
						'priority' => 25
				) );
			
			// background attachment
				$wp_customize->add_setting( 'grassroots[home_1_attachment]', array(
						'default' => $options['home_1_attachment']['std'],
						'type' => 'option'
					) );
				
				$wp_customize->add_control( 'grassroots_home_1_attachment', array(
						'label' => $options['home_1_attachment']['name'],
						'section' => 'grassroots_home_1',
						'settings' => 'grassroots[home_1_attachment]',
						'type' => $options['home_1_attachment']['type'],
						'choices' => $options['home_1_attachment']['options'],
						'priority' => 30
				) );
			
			// background horizontal position
				$wp_customize->add_setting( 'grassroots[home_1_position_horizontal]', array(
						'default' => $options['home_1_position_horizontal']['std'],
						'type' => 'option'
					) );
				
				$wp_customize->add_control( 'grassroots_home_1_position_horizontal', array(
						'label' => $options['home_1_position_horizontal']['name'],
						'section' => 'grassroots_home_1',
						'settings' => 'grassroots[home_1_position_horizontal]',
						'type' => $options['home_1_position_horizontal']['type'],
						'choices' => $options['home_1_position_horizontal']['options'],
						'priority' => 35
				) );
			
			// background vertical position
				$wp_customize->add_setting( 'grassroots[home_1_position_vertical]', array(
						'default' => $options['home_1_position_vertical']['std'],
						'type' => 'option'
					) );
				
				$wp_customize->add_control( 'grassroots_home_1_position_vertical', array(
						'label' => $options['home_1_position_vertical']['name'],
						'section' => 'grassroots_home_1',
						'settings' => 'grassroots[home_1_position_vertical]',
						'type' => $options['home_1_position_vertical']['type'],
						'choices' => $options['home_1_position_vertical']['options'],
						'priority' => 40
				) );
			
			// background size
				$wp_customize->add_setting( 'grassroots[home_1_size]', array(
						'default' => $options['home_1_size']['std'],
						'type' => 'option'
					) );
				
				$wp_customize->add_control( 'grassroots_home_1_size', array(
						'label' => $options['home_1_size']['name'],
						'section' => 'grassroots_home_1',
						'settings' => 'grassroots[home_1_size]',
						'type' => $options['home_1_size']['type'],
						'choices' => $options['home_1_size']['options'],
						'priority' => 45
				) );

	// Home Block 2
	
		$wp_customize->add_section( 'grassroots_home_2', array(
			'title' => __( 'Home Block 2', 'grassroots' ),
			'priority' => 65,
			'description' => '',
			'panel' => 'panel_home_page',
		) );		
			
			// Home 2 Text
				$wp_customize->add_setting( 'grassroots[home_2_text]', array(
					'default' => $options['home_2_text']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_2_text', array(
					'label'   => $options['home_2_text']['name'],
					'section' => 'grassroots_home_2',
					'settings'   => 'grassroots[home_2_text]',
					'priority' => 5
				) ) );
			
			// Home 2 Link
				$wp_customize->add_setting( 'grassroots[home_2_link]', array(
					'default' => $options['home_2_link']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_2_link', array(
					'label'   => $options['home_2_link']['name'],
					'section' => 'grassroots_home_2',
					'settings'   => 'grassroots[home_2_link]',
					'priority' => 7
				) ) );
			
			// Home 2 Hover
				$wp_customize->add_setting( 'grassroots[home_2_hover]', array(
					'default' => $options['home_2_hover']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_2_hover', array(
					'label'   => $options['home_2_hover']['name'],
					'section' => 'grassroots_home_2',
					'settings'   => 'grassroots[home_2_hover]',
					'priority' => 10
				) ) );
				
			// Home 2 Background
				$wp_customize->add_setting( 'grassroots[home_2]', array(
					'default' => $options['home_2']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_2', array(
					'label'   => $options['home_2']['name'],
					'section' => 'grassroots_home_2',
					'settings'   => 'grassroots[home_2]',
					'priority' => 15
				) ) );
			
				// background image
					$wp_customize->add_setting( 'grassroots[home_2_image]', array(
						'type' => 'option'
					) );
					
					$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_2_image', array(
						'label' => $options['home_2_image']['name'],
						'section' => 'grassroots_home_2',
						'settings' => 'grassroots[home_2_image]',
						'priority' => 20
					) ) );
			
				// background repeat
					$wp_customize->add_setting( 'grassroots[home_2_repeat]', array(
							'default' => $options['home_2_repeat']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_2_repeat', array(
							'label' => $options['home_2_repeat']['name'],
							'section' => 'grassroots_home_2',
							'settings' => 'grassroots[home_2_repeat]',
							'type' => $options['home_2_repeat']['type'],
							'choices' => $options['home_2_repeat']['options'],
							'priority' => 25
					) );
				
				// background attachment
					$wp_customize->add_setting( 'grassroots[home_2_attachment]', array(
							'default' => $options['home_2_attachment']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_2_attachment', array(
							'label' => $options['home_2_attachment']['name'],
							'section' => 'grassroots_home_2',
							'settings' => 'grassroots[home_2_attachment]',
							'type' => $options['home_2_attachment']['type'],
							'choices' => $options['home_2_attachment']['options'],
							'priority' => 30
					) );
				
				// background horizontal position
					$wp_customize->add_setting( 'grassroots[home_2_position_horizontal]', array(
							'default' => $options['home_2_position_horizontal']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_2_position_horizontal', array(
							'label' => $options['home_2_position_horizontal']['name'],
							'section' => 'grassroots_home_2',
							'settings' => 'grassroots[home_2_position_horizontal]',
							'type' => $options['home_2_position_horizontal']['type'],
							'choices' => $options['home_2_position_horizontal']['options'],
							'priority' => 35
					) );
				
				// background vertical position
					$wp_customize->add_setting( 'grassroots[home_2_position_vertical]', array(
							'default' => $options['home_2_position_vertical']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_2_position_vertical', array(
							'label' => $options['home_2_position_vertical']['name'],
							'section' => 'grassroots_home_2',
							'settings' => 'grassroots[home_2_position_vertical]',
							'type' => $options['home_2_position_vertical']['type'],
							'choices' => $options['home_2_position_vertical']['options'],
							'priority' => 40
					) );
				
				// background size
					$wp_customize->add_setting( 'grassroots[home_2_size]', array(
							'default' => $options['home_2_size']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_2_size', array(
							'label' => $options['home_2_size']['name'],
							'section' => 'grassroots_home_2',
							'settings' => 'grassroots[home_2_size]',
							'type' => $options['home_2_size']['type'],
							'choices' => $options['home_2_size']['options'],
							'priority' => 45
					) );
	
	// Home Block 3
	
		$wp_customize->add_section( 'grassroots_home_3', array(
			'title' => __( 'Home Block 3', 'grassroots' ),
			'priority' => 70,
			'description' => '',
			'panel' => 'panel_home_page',
		) );		
			
			// Home 2 Text
				$wp_customize->add_setting( 'grassroots[home_3_text]', array(
					'default' => $options['home_3_text']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_3_text', array(
					'label'   => $options['home_3_text']['name'],
					'section' => 'grassroots_home_3',
					'settings'   => 'grassroots[home_3_text]',
					'priority' => 5
				) ) );
			
			// Home 2 Link
				$wp_customize->add_setting( 'grassroots[home_3_link]', array(
					'default' => $options['home_3_link']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_3_link', array(
					'label'   => $options['home_3_link']['name'],
					'section' => 'grassroots_home_3',
					'settings'   => 'grassroots[home_3_link]',
					'priority' => 7
				) ) );
			
			// Home 2 Hover
				$wp_customize->add_setting( 'grassroots[home_3_hover]', array(
					'default' => $options['home_3_hover']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_3_hover', array(
					'label'   => $options['home_3_hover']['name'],
					'section' => 'grassroots_home_3',
					'settings'   => 'grassroots[home_3_hover]',
					'priority' => 10
				) ) );
				
			// Home 2 Background
				$wp_customize->add_setting( 'grassroots[home_3]', array(
					'default' => $options['home_3']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_3', array(
					'label'   => $options['home_3']['name'],
					'section' => 'grassroots_home_3',
					'settings'   => 'grassroots[home_3]',
					'priority' => 15
				) ) );
			
				// background image
					$wp_customize->add_setting( 'grassroots[home_3_image]', array(
						'type' => 'option'
					) );
					
					$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_3_image', array(
						'label' => $options['home_3_image']['name'],
						'section' => 'grassroots_home_3',
						'settings' => 'grassroots[home_3_image]',
						'priority' => 20
					) ) );
			
				// background repeat
					$wp_customize->add_setting( 'grassroots[home_3_repeat]', array(
							'default' => $options['home_3_repeat']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_3_repeat', array(
							'label' => $options['home_3_repeat']['name'],
							'section' => 'grassroots_home_3',
							'settings' => 'grassroots[home_3_repeat]',
							'type' => $options['home_3_repeat']['type'],
							'choices' => $options['home_3_repeat']['options'],
							'priority' => 25
					) );
				
				// background attachment
					$wp_customize->add_setting( 'grassroots[home_3_attachment]', array(
							'default' => $options['home_3_attachment']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_3_attachment', array(
							'label' => $options['home_3_attachment']['name'],
							'section' => 'grassroots_home_3',
							'settings' => 'grassroots[home_3_attachment]',
							'type' => $options['home_3_attachment']['type'],
							'choices' => $options['home_3_attachment']['options'],
							'priority' => 30
					) );
				
				// background horizontal position
					$wp_customize->add_setting( 'grassroots[home_3_position_horizontal]', array(
							'default' => $options['home_3_position_horizontal']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_3_position_horizontal', array(
							'label' => $options['home_3_position_horizontal']['name'],
							'section' => 'grassroots_home_3',
							'settings' => 'grassroots[home_3_position_horizontal]',
							'type' => $options['home_3_position_horizontal']['type'],
							'choices' => $options['home_3_position_horizontal']['options'],
							'priority' => 35
					) );
				
				// background vertical position
					$wp_customize->add_setting( 'grassroots[home_3_position_vertical]', array(
							'default' => $options['home_3_position_vertical']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_3_position_vertical', array(
							'label' => $options['home_3_position_vertical']['name'],
							'section' => 'grassroots_home_3',
							'settings' => 'grassroots[home_3_position_vertical]',
							'type' => $options['home_3_position_vertical']['type'],
							'choices' => $options['home_3_position_vertical']['options'],
							'priority' => 40
					) );
				
				// background size
					$wp_customize->add_setting( 'grassroots[home_3_size]', array(
							'default' => $options['home_3_size']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_3_size', array(
							'label' => $options['home_3_size']['name'],
							'section' => 'grassroots_home_3',
							'settings' => 'grassroots[home_3_size]',
							'type' => $options['home_3_size']['type'],
							'choices' => $options['home_3_size']['options'],
							'priority' => 45
					) );
	
	// Home Block 4
	
		$wp_customize->add_section( 'grassroots_home_4', array(
			'title' => __( 'Home Block 4', 'grassroots' ),
			'priority' => 75,
			'description' => '',
			'panel' => 'panel_home_page',
		) );		
			
			// Home 2 Text
				$wp_customize->add_setting( 'grassroots[home_4_text]', array(
					'default' => $options['home_4_text']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_4_text', array(
					'label'   => $options['home_4_text']['name'],
					'section' => 'grassroots_home_4',
					'settings'   => 'grassroots[home_4_text]',
					'priority' => 5
				) ) );
			
			// Home 2 Link
				$wp_customize->add_setting( 'grassroots[home_4_link]', array(
					'default' => $options['home_4_link']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_4_link', array(
					'label'   => $options['home_4_link']['name'],
					'section' => 'grassroots_home_4',
					'settings'   => 'grassroots[home_4_link]',
					'priority' => 7
				) ) );
			
			// Home 2 Hover
				$wp_customize->add_setting( 'grassroots[home_4_hover]', array(
					'default' => $options['home_4_hover']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_4_hover', array(
					'label'   => $options['home_4_hover']['name'],
					'section' => 'grassroots_home_4',
					'settings'   => 'grassroots[home_4_hover]',
					'priority' => 10
				) ) );
				
			// Home 2 Background
				$wp_customize->add_setting( 'grassroots[home_4]', array(
					'default' => $options['home_4']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_4', array(
					'label'   => $options['home_4']['name'],
					'section' => 'grassroots_home_4',
					'settings'   => 'grassroots[home_4]',
					'priority' => 15
				) ) );
			
				// background image
					$wp_customize->add_setting( 'grassroots[home_4_image]', array(
						'type' => 'option'
					) );
					
					$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_4_image', array(
						'label' => $options['home_4_image']['name'],
						'section' => 'grassroots_home_4',
						'settings' => 'grassroots[home_4_image]',
						'priority' => 20
					) ) );
			
				// background repeat
					$wp_customize->add_setting( 'grassroots[home_4_repeat]', array(
							'default' => $options['home_4_repeat']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_4_repeat', array(
							'label' => $options['home_4_repeat']['name'],
							'section' => 'grassroots_home_4',
							'settings' => 'grassroots[home_4_repeat]',
							'type' => $options['home_4_repeat']['type'],
							'choices' => $options['home_4_repeat']['options'],
							'priority' => 25
					) );
				
				// background attachment
					$wp_customize->add_setting( 'grassroots[home_4_attachment]', array(
							'default' => $options['home_4_attachment']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_4_attachment', array(
							'label' => $options['home_4_attachment']['name'],
							'section' => 'grassroots_home_4',
							'settings' => 'grassroots[home_4_attachment]',
							'type' => $options['home_4_attachment']['type'],
							'choices' => $options['home_4_attachment']['options'],
							'priority' => 30
					) );
				
				// background horizontal position
					$wp_customize->add_setting( 'grassroots[home_4_position_horizontal]', array(
							'default' => $options['home_4_position_horizontal']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_4_position_horizontal', array(
							'label' => $options['home_4_position_horizontal']['name'],
							'section' => 'grassroots_home_4',
							'settings' => 'grassroots[home_4_position_horizontal]',
							'type' => $options['home_4_position_horizontal']['type'],
							'choices' => $options['home_4_position_horizontal']['options'],
							'priority' => 35
					) );
				
				// background vertical position
					$wp_customize->add_setting( 'grassroots[home_4_position_vertical]', array(
							'default' => $options['home_4_position_vertical']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_4_position_vertical', array(
							'label' => $options['home_4_position_vertical']['name'],
							'section' => 'grassroots_home_4',
							'settings' => 'grassroots[home_4_position_vertical]',
							'type' => $options['home_4_position_vertical']['type'],
							'choices' => $options['home_4_position_vertical']['options'],
							'priority' => 40
					) );
				
				// background size
					$wp_customize->add_setting( 'grassroots[home_4_size]', array(
							'default' => $options['home_4_size']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_4_size', array(
							'label' => $options['home_4_size']['name'],
							'section' => 'grassroots_home_4',
							'settings' => 'grassroots[home_4_size]',
							'type' => $options['home_4_size']['type'],
							'choices' => $options['home_4_size']['options'],
							'priority' => 45
					) );
	
	// Home Block 5
	
		$wp_customize->add_section( 'grassroots_home_5', array(
			'title' => __( 'Home Block 5', 'grassroots' ),
			'priority' => 80,
			'description' => '',
			'panel' => 'panel_home_page',
		) );		
			
			// Home 2 Text
				$wp_customize->add_setting( 'grassroots[home_5_text]', array(
					'default' => $options['home_5_text']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_5_text', array(
					'label'   => $options['home_5_text']['name'],
					'section' => 'grassroots_home_5',
					'settings'   => 'grassroots[home_5_text]',
					'priority' => 5
				) ) );
			
			// Home 2 Link
				$wp_customize->add_setting( 'grassroots[home_5_link]', array(
					'default' => $options['home_5_link']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_5_link', array(
					'label'   => $options['home_5_link']['name'],
					'section' => 'grassroots_home_5',
					'settings'   => 'grassroots[home_5_link]',
					'priority' => 7
				) ) );
			
			// Home 2 Hover
				$wp_customize->add_setting( 'grassroots[home_5_hover]', array(
					'default' => $options['home_5_hover']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_5_hover', array(
					'label'   => $options['home_5_hover']['name'],
					'section' => 'grassroots_home_5',
					'settings'   => 'grassroots[home_5_hover]',
					'priority' => 10
				) ) );
				
			// Home 2 Background
				$wp_customize->add_setting( 'grassroots[home_5]', array(
					'default' => $options['home_5']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_5', array(
					'label'   => $options['home_5']['name'],
					'section' => 'grassroots_home_5',
					'settings'   => 'grassroots[home_5]',
					'priority' => 15
				) ) );
			
				// background image
					$wp_customize->add_setting( 'grassroots[home_5_image]', array(
						'type' => 'option'
					) );
					
					$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_5_image', array(
						'label' => $options['home_5_image']['name'],
						'section' => 'grassroots_home_5',
						'settings' => 'grassroots[home_5_image]',
						'priority' => 20
					) ) );
			
				// background repeat
					$wp_customize->add_setting( 'grassroots[home_5_repeat]', array(
							'default' => $options['home_5_repeat']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_5_repeat', array(
							'label' => $options['home_5_repeat']['name'],
							'section' => 'grassroots_home_5',
							'settings' => 'grassroots[home_5_repeat]',
							'type' => $options['home_5_repeat']['type'],
							'choices' => $options['home_5_repeat']['options'],
							'priority' => 25
					) );
				
				// background attachment
					$wp_customize->add_setting( 'grassroots[home_5_attachment]', array(
							'default' => $options['home_5_attachment']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_5_attachment', array(
							'label' => $options['home_5_attachment']['name'],
							'section' => 'grassroots_home_5',
							'settings' => 'grassroots[home_5_attachment]',
							'type' => $options['home_5_attachment']['type'],
							'choices' => $options['home_5_attachment']['options'],
							'priority' => 30
					) );
				
				// background horizontal position
					$wp_customize->add_setting( 'grassroots[home_5_position_horizontal]', array(
							'default' => $options['home_5_position_horizontal']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_5_position_horizontal', array(
							'label' => $options['home_5_position_horizontal']['name'],
							'section' => 'grassroots_home_5',
							'settings' => 'grassroots[home_5_position_horizontal]',
							'type' => $options['home_5_position_horizontal']['type'],
							'choices' => $options['home_5_position_horizontal']['options'],
							'priority' => 35
					) );
				
				// background vertical position
					$wp_customize->add_setting( 'grassroots[home_5_position_vertical]', array(
							'default' => $options['home_5_position_vertical']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_5_position_vertical', array(
							'label' => $options['home_5_position_vertical']['name'],
							'section' => 'grassroots_home_5',
							'settings' => 'grassroots[home_5_position_vertical]',
							'type' => $options['home_5_position_vertical']['type'],
							'choices' => $options['home_5_position_vertical']['options'],
							'priority' => 40
					) );
				
				// background size
					$wp_customize->add_setting( 'grassroots[home_5_size]', array(
							'default' => $options['home_5_size']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_5_size', array(
							'label' => $options['home_5_size']['name'],
							'section' => 'grassroots_home_5',
							'settings' => 'grassroots[home_5_size]',
							'type' => $options['home_5_size']['type'],
							'choices' => $options['home_5_size']['options'],
							'priority' => 45
					) );
	
	// Home Block 6
	
		$wp_customize->add_section( 'grassroots_home_6', array(
			'title' => __( 'Home Block 6', 'grassroots' ),
			'priority' => 90,
			'description' => '',
			'panel' => 'panel_home_page',
		) );		
			
			// Home 2 Text
				$wp_customize->add_setting( 'grassroots[home_6_text]', array(
					'default' => $options['home_6_text']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_6_text', array(
					'label'   => $options['home_6_text']['name'],
					'section' => 'grassroots_home_6',
					'settings'   => 'grassroots[home_6_text]',
					'priority' => 5
				) ) );
			
			// Home 2 Link
				$wp_customize->add_setting( 'grassroots[home_6_link]', array(
					'default' => $options['home_6_link']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_6_link', array(
					'label'   => $options['home_6_link']['name'],
					'section' => 'grassroots_home_6',
					'settings'   => 'grassroots[home_6_link]',
					'priority' => 7
				) ) );
			
			// Home 2 Hover
				$wp_customize->add_setting( 'grassroots[home_6_hover]', array(
					'default' => $options['home_6_hover']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_6_hover', array(
					'label'   => $options['home_6_hover']['name'],
					'section' => 'grassroots_home_6',
					'settings'   => 'grassroots[home_6_hover]',
					'priority' => 10
				) ) );
				
			// Home 2 Background
				$wp_customize->add_setting( 'grassroots[home_6]', array(
					'default' => $options['home_6']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_6', array(
					'label'   => $options['home_6']['name'],
					'section' => 'grassroots_home_6',
					'settings'   => 'grassroots[home_6]',
					'priority' => 15
				) ) );
			
				// background image
					$wp_customize->add_setting( 'grassroots[home_6_image]', array(
						'type' => 'option'
					) );
					
					$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_6_image', array(
						'label' => $options['home_6_image']['name'],
						'section' => 'grassroots_home_6',
						'settings' => 'grassroots[home_6_image]',
						'priority' => 20
					) ) );
			
				// background repeat
					$wp_customize->add_setting( 'grassroots[home_6_repeat]', array(
							'default' => $options['home_6_repeat']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_6_repeat', array(
							'label' => $options['home_6_repeat']['name'],
							'section' => 'grassroots_home_6',
							'settings' => 'grassroots[home_6_repeat]',
							'type' => $options['home_6_repeat']['type'],
							'choices' => $options['home_6_repeat']['options'],
							'priority' => 25
					) );
				
				// background attachment
					$wp_customize->add_setting( 'grassroots[home_6_attachment]', array(
							'default' => $options['home_6_attachment']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_6_attachment', array(
							'label' => $options['home_6_attachment']['name'],
							'section' => 'grassroots_home_6',
							'settings' => 'grassroots[home_6_attachment]',
							'type' => $options['home_6_attachment']['type'],
							'choices' => $options['home_6_attachment']['options'],
							'priority' => 30
					) );
				
				// background horizontal position
					$wp_customize->add_setting( 'grassroots[home_6_position_horizontal]', array(
							'default' => $options['home_6_position_horizontal']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_6_position_horizontal', array(
							'label' => $options['home_6_position_horizontal']['name'],
							'section' => 'grassroots_home_6',
							'settings' => 'grassroots[home_6_position_horizontal]',
							'type' => $options['home_6_position_horizontal']['type'],
							'choices' => $options['home_6_position_horizontal']['options'],
							'priority' => 35
					) );
				
				// background vertical position
					$wp_customize->add_setting( 'grassroots[home_6_position_vertical]', array(
							'default' => $options['home_6_position_vertical']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_6_position_vertical', array(
							'label' => $options['home_6_position_vertical']['name'],
							'section' => 'grassroots_home_6',
							'settings' => 'grassroots[home_6_position_vertical]',
							'type' => $options['home_6_position_vertical']['type'],
							'choices' => $options['home_6_position_vertical']['options'],
							'priority' => 40
					) );
				
				// background size
					$wp_customize->add_setting( 'grassroots[home_6_size]', array(
							'default' => $options['home_6_size']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_6_size', array(
							'label' => $options['home_6_size']['name'],
							'section' => 'grassroots_home_6',
							'settings' => 'grassroots[home_6_size]',
							'type' => $options['home_6_size']['type'],
							'choices' => $options['home_6_size']['options'],
							'priority' => 45
					) );
	
	// Home Block 7
	
		$wp_customize->add_section( 'grassroots_home_7', array(
			'title' => __( 'Home Block 7', 'grassroots' ),
			'priority' => 100,
			'description' => '',
			'panel' => 'panel_home_page',
		) );		
			
			// Home 2 Text
				$wp_customize->add_setting( 'grassroots[home_7_text]', array(
					'default' => $options['home_7_text']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_7_text', array(
					'label'   => $options['home_7_text']['name'],
					'section' => 'grassroots_home_7',
					'settings'   => 'grassroots[home_7_text]',
					'priority' => 5
				) ) );
			
			// Home 2 Link
				$wp_customize->add_setting( 'grassroots[home_7_link]', array(
					'default' => $options['home_7_link']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_7_link', array(
					'label'   => $options['home_7_link']['name'],
					'section' => 'grassroots_home_7',
					'settings'   => 'grassroots[home_7_link]',
					'priority' => 7
				) ) );
			
			// Home 2 Hover
				$wp_customize->add_setting( 'grassroots[home_7_hover]', array(
					'default' => $options['home_7_hover']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_7_hover', array(
					'label'   => $options['home_7_hover']['name'],
					'section' => 'grassroots_home_7',
					'settings'   => 'grassroots[home_7_hover]',
					'priority' => 10
				) ) );
				
			// Home 2 Background
				$wp_customize->add_setting( 'grassroots[home_7]', array(
					'default' => $options['home_7']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_7', array(
					'label'   => $options['home_7']['name'],
					'section' => 'grassroots_home_7',
					'settings'   => 'grassroots[home_7]',
					'priority' => 15
				) ) );
			
				// background image
					$wp_customize->add_setting( 'grassroots[home_7_image]', array(
						'type' => 'option'
					) );
					
					$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_7_image', array(
						'label' => $options['home_7_image']['name'],
						'section' => 'grassroots_home_7',
						'settings' => 'grassroots[home_7_image]',
						'priority' => 20
					) ) );
			
				// background repeat
					$wp_customize->add_setting( 'grassroots[home_7_repeat]', array(
							'default' => $options['home_7_repeat']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_7_repeat', array(
							'label' => $options['home_7_repeat']['name'],
							'section' => 'grassroots_home_7',
							'settings' => 'grassroots[home_7_repeat]',
							'type' => $options['home_7_repeat']['type'],
							'choices' => $options['home_7_repeat']['options'],
							'priority' => 25
					) );
				
				// background attachment
					$wp_customize->add_setting( 'grassroots[home_7_attachment]', array(
							'default' => $options['home_7_attachment']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_7_attachment', array(
							'label' => $options['home_7_attachment']['name'],
							'section' => 'grassroots_home_7',
							'settings' => 'grassroots[home_7_attachment]',
							'type' => $options['home_7_attachment']['type'],
							'choices' => $options['home_7_attachment']['options'],
							'priority' => 30
					) );
				
				// background horizontal position
					$wp_customize->add_setting( 'grassroots[home_7_position_horizontal]', array(
							'default' => $options['home_7_position_horizontal']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_7_position_horizontal', array(
							'label' => $options['home_7_position_horizontal']['name'],
							'section' => 'grassroots_home_7',
							'settings' => 'grassroots[home_7_position_horizontal]',
							'type' => $options['home_7_position_horizontal']['type'],
							'choices' => $options['home_7_position_horizontal']['options'],
							'priority' => 35
					) );
				
				// background vertical position
					$wp_customize->add_setting( 'grassroots[home_7_position_vertical]', array(
							'default' => $options['home_7_position_vertical']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_7_position_vertical', array(
							'label' => $options['home_7_position_vertical']['name'],
							'section' => 'grassroots_home_7',
							'settings' => 'grassroots[home_7_position_vertical]',
							'type' => $options['home_7_position_vertical']['type'],
							'choices' => $options['home_7_position_vertical']['options'],
							'priority' => 40
					) );
				
				// background size
					$wp_customize->add_setting( 'grassroots[home_7_size]', array(
							'default' => $options['home_7_size']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_7_size', array(
							'label' => $options['home_7_size']['name'],
							'section' => 'grassroots_home_7',
							'settings' => 'grassroots[home_7_size]',
							'type' => $options['home_7_size']['type'],
							'choices' => $options['home_7_size']['options'],
							'priority' => 45
					) );
	
	// Home Block 8
	
		$wp_customize->add_section( 'grassroots_home_8', array(
			'title' => __( 'Home Block 8', 'grassroots' ),
			'priority' => 101,
			'description' => '',
			'panel' => 'panel_home_page',
		) );		
			
			// Home 2 Text
				$wp_customize->add_setting( 'grassroots[home_8_text]', array(
					'default' => $options['home_8_text']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_8_text', array(
					'label'   => $options['home_8_text']['name'],
					'section' => 'grassroots_home_8',
					'settings'   => 'grassroots[home_8_text]',
					'priority' => 5
				) ) );
			
			// Home 2 Link
				$wp_customize->add_setting( 'grassroots[home_8_link]', array(
					'default' => $options['home_8_link']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_8_link', array(
					'label'   => $options['home_8_link']['name'],
					'section' => 'grassroots_home_8',
					'settings'   => 'grassroots[home_8_link]',
					'priority' => 7
				) ) );
			
			// Home 2 Hover
				$wp_customize->add_setting( 'grassroots[home_8_hover]', array(
					'default' => $options['home_8_hover']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_8_hover', array(
					'label'   => $options['home_8_hover']['name'],
					'section' => 'grassroots_home_8',
					'settings'   => 'grassroots[home_8_hover]',
					'priority' => 10
				) ) );
				
			// Home 2 Background
				$wp_customize->add_setting( 'grassroots[home_8]', array(
					'default' => $options['home_8']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_8', array(
					'label'   => $options['home_8']['name'],
					'section' => 'grassroots_home_8',
					'settings'   => 'grassroots[home_8]',
					'priority' => 15
				) ) );
			
				// background image
					$wp_customize->add_setting( 'grassroots[home_8_image]', array(
						'type' => 'option'
					) );
					
					$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_8_image', array(
						'label' => $options['home_8_image']['name'],
						'section' => 'grassroots_home_8',
						'settings' => 'grassroots[home_8_image]',
						'priority' => 20
					) ) );
			
				// background repeat
					$wp_customize->add_setting( 'grassroots[home_8_repeat]', array(
							'default' => $options['home_8_repeat']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_8_repeat', array(
							'label' => $options['home_8_repeat']['name'],
							'section' => 'grassroots_home_8',
							'settings' => 'grassroots[home_8_repeat]',
							'type' => $options['home_8_repeat']['type'],
							'choices' => $options['home_8_repeat']['options'],
							'priority' => 25
					) );
				
				// background attachment
					$wp_customize->add_setting( 'grassroots[home_8_attachment]', array(
							'default' => $options['home_8_attachment']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_8_attachment', array(
							'label' => $options['home_8_attachment']['name'],
							'section' => 'grassroots_home_8',
							'settings' => 'grassroots[home_8_attachment]',
							'type' => $options['home_8_attachment']['type'],
							'choices' => $options['home_8_attachment']['options'],
							'priority' => 30
					) );
				
				// background horizontal position
					$wp_customize->add_setting( 'grassroots[home_8_position_horizontal]', array(
							'default' => $options['home_8_position_horizontal']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_8_position_horizontal', array(
							'label' => $options['home_8_position_horizontal']['name'],
							'section' => 'grassroots_home_8',
							'settings' => 'grassroots[home_8_position_horizontal]',
							'type' => $options['home_8_position_horizontal']['type'],
							'choices' => $options['home_8_position_horizontal']['options'],
							'priority' => 35
					) );
				
				// background vertical position
					$wp_customize->add_setting( 'grassroots[home_8_position_vertical]', array(
							'default' => $options['home_8_position_vertical']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_8_position_vertical', array(
							'label' => $options['home_8_position_vertical']['name'],
							'section' => 'grassroots_home_8',
							'settings' => 'grassroots[home_8_position_vertical]',
							'type' => $options['home_8_position_vertical']['type'],
							'choices' => $options['home_8_position_vertical']['options'],
							'priority' => 40
					) );
				
				// background size
					$wp_customize->add_setting( 'grassroots[home_8_size]', array(
							'default' => $options['home_8_size']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_8_size', array(
							'label' => $options['home_8_size']['name'],
							'section' => 'grassroots_home_8',
							'settings' => 'grassroots[home_8_size]',
							'type' => $options['home_8_size']['type'],
							'choices' => $options['home_8_size']['options'],
							'priority' => 45
					) );
	
	// Home Block 9
	
		$wp_customize->add_section( 'grassroots_home_9', array(
			'title' => __( 'Home Block 9', 'grassroots' ),
			'priority' => 102,
			'description' => '',
			'panel' => 'panel_home_page',
		) );		
			
			// Home 2 Text
				$wp_customize->add_setting( 'grassroots[home_9_text]', array(
					'default' => $options['home_9_text']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_9_text', array(
					'label'   => $options['home_9_text']['name'],
					'section' => 'grassroots_home_9',
					'settings'   => 'grassroots[home_9_text]',
					'priority' => 5
				) ) );
			
			// Home 2 Link
				$wp_customize->add_setting( 'grassroots[home_9_link]', array(
					'default' => $options['home_9_link']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_9_link', array(
					'label'   => $options['home_9_link']['name'],
					'section' => 'grassroots_home_9',
					'settings'   => 'grassroots[home_9_link]',
					'priority' => 7
				) ) );
			
			// Home 2 Hover
				$wp_customize->add_setting( 'grassroots[home_9_hover]', array(
					'default' => $options['home_9_hover']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_9_hover', array(
					'label'   => $options['home_9_hover']['name'],
					'section' => 'grassroots_home_9',
					'settings'   => 'grassroots[home_9_hover]',
					'priority' => 10
				) ) );
				
			// Home 2 Background
				$wp_customize->add_setting( 'grassroots[home_9]', array(
					'default' => $options['home_9']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_9', array(
					'label'   => $options['home_9']['name'],
					'section' => 'grassroots_home_9',
					'settings'   => 'grassroots[home_9]',
					'priority' => 15
				) ) );
			
				// background image
					$wp_customize->add_setting( 'grassroots[home_9_image]', array(
						'type' => 'option'
					) );
					
					$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_9_image', array(
						'label' => $options['home_9_image']['name'],
						'section' => 'grassroots_home_9',
						'settings' => 'grassroots[home_9_image]',
						'priority' => 20
					) ) );
			
				// background repeat
					$wp_customize->add_setting( 'grassroots[home_9_repeat]', array(
							'default' => $options['home_9_repeat']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_9_repeat', array(
							'label' => $options['home_9_repeat']['name'],
							'section' => 'grassroots_home_9',
							'settings' => 'grassroots[home_9_repeat]',
							'type' => $options['home_9_repeat']['type'],
							'choices' => $options['home_9_repeat']['options'],
							'priority' => 25
					) );
				
				// background attachment
					$wp_customize->add_setting( 'grassroots[home_9_attachment]', array(
							'default' => $options['home_9_attachment']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_9_attachment', array(
							'label' => $options['home_9_attachment']['name'],
							'section' => 'grassroots_home_9',
							'settings' => 'grassroots[home_9_attachment]',
							'type' => $options['home_9_attachment']['type'],
							'choices' => $options['home_9_attachment']['options'],
							'priority' => 30
					) );
				
				// background horizontal position
					$wp_customize->add_setting( 'grassroots[home_9_position_horizontal]', array(
							'default' => $options['home_9_position_horizontal']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_9_position_horizontal', array(
							'label' => $options['home_9_position_horizontal']['name'],
							'section' => 'grassroots_home_9',
							'settings' => 'grassroots[home_9_position_horizontal]',
							'type' => $options['home_9_position_horizontal']['type'],
							'choices' => $options['home_9_position_horizontal']['options'],
							'priority' => 35
					) );
				
				// background vertical position
					$wp_customize->add_setting( 'grassroots[home_9_position_vertical]', array(
							'default' => $options['home_9_position_vertical']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_9_position_vertical', array(
							'label' => $options['home_9_position_vertical']['name'],
							'section' => 'grassroots_home_9',
							'settings' => 'grassroots[home_9_position_vertical]',
							'type' => $options['home_9_position_vertical']['type'],
							'choices' => $options['home_9_position_vertical']['options'],
							'priority' => 40
					) );
				
				// background size
					$wp_customize->add_setting( 'grassroots[home_9_size]', array(
							'default' => $options['home_9_size']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_9_size', array(
							'label' => $options['home_9_size']['name'],
							'section' => 'grassroots_home_9',
							'settings' => 'grassroots[home_9_size]',
							'type' => $options['home_9_size']['type'],
							'choices' => $options['home_9_size']['options'],
							'priority' => 45
					) );
	
	// Home Block 10
	
		$wp_customize->add_section( 'grassroots_home_10', array(
			'title' => __( 'Home Block 10', 'grassroots' ),
			'priority' => 103,
			'description' => '',
			'panel' => 'panel_home_page',
		) );		
			
			// Home 2 Text
				$wp_customize->add_setting( 'grassroots[home_10_text]', array(
					'default' => $options['home_10_text']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_10_text', array(
					'label'   => $options['home_10_text']['name'],
					'section' => 'grassroots_home_10',
					'settings'   => 'grassroots[home_10_text]',
					'priority' => 5
				) ) );
			
			// Home 2 Link
				$wp_customize->add_setting( 'grassroots[home_10_link]', array(
					'default' => $options['home_10_link']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_10_link', array(
					'label'   => $options['home_10_link']['name'],
					'section' => 'grassroots_home_10',
					'settings'   => 'grassroots[home_10_link]',
					'priority' => 7
				) ) );
			
			// Home 2 Hover
				$wp_customize->add_setting( 'grassroots[home_10_hover]', array(
					'default' => $options['home_10_hover']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_10_hover', array(
					'label'   => $options['home_10_hover']['name'],
					'section' => 'grassroots_home_10',
					'settings'   => 'grassroots[home_10_hover]',
					'priority' => 10
				) ) );
				
			// Home 2 Background
				$wp_customize->add_setting( 'grassroots[home_10]', array(
					'default' => $options['home_10']['std'],
					'type' => 'option'
				) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_10', array(
					'label'   => $options['home_10']['name'],
					'section' => 'grassroots_home_10',
					'settings'   => 'grassroots[home_10]',
					'priority' => 15
				) ) );
			
				// background image
					$wp_customize->add_setting( 'grassroots[home_10_image]', array(
						'type' => 'option'
					) );
					
					$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_10_image', array(
						'label' => $options['home_10_image']['name'],
						'section' => 'grassroots_home_10',
						'settings' => 'grassroots[home_10_image]',
						'priority' => 20
					) ) );
			
				// background repeat
					$wp_customize->add_setting( 'grassroots[home_10_repeat]', array(
							'default' => $options['home_10_repeat']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_10_repeat', array(
							'label' => $options['home_10_repeat']['name'],
							'section' => 'grassroots_home_10',
							'settings' => 'grassroots[home_10_repeat]',
							'type' => $options['home_10_repeat']['type'],
							'choices' => $options['home_10_repeat']['options'],
							'priority' => 25
					) );
				
				// background attachment
					$wp_customize->add_setting( 'grassroots[home_10_attachment]', array(
							'default' => $options['home_10_attachment']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_10_attachment', array(
							'label' => $options['home_10_attachment']['name'],
							'section' => 'grassroots_home_10',
							'settings' => 'grassroots[home_10_attachment]',
							'type' => $options['home_10_attachment']['type'],
							'choices' => $options['home_10_attachment']['options'],
							'priority' => 30
					) );
				
				// background horizontal position
					$wp_customize->add_setting( 'grassroots[home_10_position_horizontal]', array(
							'default' => $options['home_10_position_horizontal']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_10_position_horizontal', array(
							'label' => $options['home_10_position_horizontal']['name'],
							'section' => 'grassroots_home_10',
							'settings' => 'grassroots[home_10_position_horizontal]',
							'type' => $options['home_10_position_horizontal']['type'],
							'choices' => $options['home_10_position_horizontal']['options'],
							'priority' => 35
					) );
				
				// background vertical position
					$wp_customize->add_setting( 'grassroots[home_10_position_vertical]', array(
							'default' => $options['home_10_position_vertical']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_10_position_vertical', array(
							'label' => $options['home_10_position_vertical']['name'],
							'section' => 'grassroots_home_10',
							'settings' => 'grassroots[home_10_position_vertical]',
							'type' => $options['home_10_position_vertical']['type'],
							'choices' => $options['home_10_position_vertical']['options'],
							'priority' => 40
					) );
				
				// background size
					$wp_customize->add_setting( 'grassroots[home_10_size]', array(
							'default' => $options['home_10_size']['std'],
							'type' => 'option'
						) );
					
					$wp_customize->add_control( 'grassroots_home_10_size', array(
							'label' => $options['home_10_size']['name'],
							'section' => 'grassroots_home_10',
							'settings' => 'grassroots[home_10_size]',
							'type' => $options['home_10_size']['type'],
							'choices' => $options['home_10_size']['options'],
							'priority' => 45
					) );


		
}