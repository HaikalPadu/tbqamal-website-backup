<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	$optionsframework_settings = ! empty( get_option('optionsframework') ) ? get_option('optionsframework') : [];
	
	// Edit 'options-theme-customizer' and set your own theme name instead
	$optionsframework_settings['id'] = 'grassroots';
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
		
	// Graphic logo or dynamic text
		$logo_type = array(
			"text" => __( 'Text', 'grassroots' ),
			"image" => __( 'Image', 'grassroots' )
		);
	
	// Yes or No
		$yes = array(
			"yes" => __( 'Yes', 'grassroots' ),
			"no" => __( 'No', 'grassroots' )
		);
	
	// Yes or No
		$true = array(
			"1" => __( 'Yes', 'grassroots' ),
			"0" => __( 'No', 'grassroots' )
		);
	
	// Yes or No
		$false = array(
			"0" => __( 'No', 'grassroots' ),
			"1" => __( 'Yes', 'grassroots' )
		);
	
	// excerpt or full content
		$content_type = array(
			"excerpt" => __( 'Excerpt', 'grassroots' ),
			"content" => __( 'Full Content', 'grassroots' )
			);
	
	// Background Options
		$background_repeat = array(
			"" => __( '', 'grassroots' ),
			"repeat" => __( 'Repeat All', 'grassroots' ),
			"repeat-y" => __( 'Repeat Vertically', 'grassroots' ),
			"repeat-x" => __( 'Repeat Horizontally', 'grassroots' ),
			"no-repeat" => __( 'No Repeat', 'grassroots' )
			);
		
		$background_attachment = array(
			"" => __( '', 'grassroots' ),
			"scroll" => __( 'Scroll', 'grassroots' ),
			"fixed" => __( 'Fixed', 'grassroots' )
			);
		
		$background_position_x = array(
			"" => __( '', 'grassroots' ),
			"left" => __( 'Left', 'grassroots' ),
			"center" => __( 'Center', 'grassroots' ),
			"right" => __( 'Right', 'grassroots' )
			);
		
		$background_position_y = array(
			"" => __( '', 'grassroots' ),
			"top" => __( 'Top', 'grassroots' ),
			"center" => __( 'Center', 'grassroots' ),
			"bottom" => __( 'Bottom', 'grassroots' )
			);
		
		$background_size = array(
			"" => __( 'None', 'grassroots' ),
			"cover" => __( 'Cover', 'grassroots' ),
			"contain" => __( 'Contain', 'grassroots' )
			);
	
	// lightbox styling
		$light_style = array(
			"default" => __( 'Default', 'grassroots' ),
			"carbono" => __( 'Carbono', 'grassroots' ),
			"classic" => __( 'Classic', 'grassroots' ),
			"classic_dark" => __( 'Classic Dark', 'grassroots' ),
			"evolution" => __( 'Evolution', 'grassroots' ),
			"evolution_dark" => __( 'Evolution Dark', 'grassroots' ),
			"facebook" => __( 'Facebook', 'grassroots' ),
			"minimal" => __( 'Minimalist', 'grassroots' ),
			"minimal_dark" => __( 'Minimalist Dark', 'grassroots' ),
			"white" => __( 'White and Green', 'grassroots' )
		);
	
	// If using image radio buttons, define a directory path
		$imagepath =  get_template_directory_uri() . '/inc/images/';
	
	// Editor Options
		$wp_editor_settings = array(
			'wpautop' => false,
			'textarea_rows' => 2,
			'tinymce' => array( 'plugins' => 'wordpress' )
		);
		
		
		
		
	$options = array();
		
$options[] = array( "name" => __( 'Header', 'grassroots' ),
					"desc" => __( '', 'grassroots' ),
					"type" => "heading");
	
	$options[] = array(
		'name' => __('Logo', 'grassroots'),
		'desc' => __('', 'grassroots'),
		'type' => 'info');
						
	$options['header_blog_title'] = array( "name" => __( 'Text or Graphic Logo', 'grassroots' ),
						"desc" => __( 'Choose between a graphic logo or the site title.', 'grassroots' ),
						"id" => "header_blog_title",
						"std" => "Text",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $logo_type);
	
	$options['logo'] = array( "name" => __( 'Logo', 'grassroots' ),
						"desc" => __( 'Upload a graphic logo here.', 'grassroots' ),
						"id" => "logo",
						"type" => "upload");
	
	
	$options['site_title_font'] = array( 'name' => __( 'Text Logo Font', 'grassroots' ),
			'desc' => __( 'Choose the type for your text logo.', 'grassroots' ),
			'id' => 'site_title_font',
			'std' => array( 'size' => '50px', 'face' => 'Open Sans, sans-serif', 'color' => '#ffffff'),
			'type' => 'typography',
			'options' => array(
				'faces' => options_typography_get_google_fonts(),
				'styles' => false,
				'color' => false )
			);
	
	$options['logo_color'] = array( "name" => __( 'Text Logo Color', 'grassroots' ),
						"desc" => __( 'The color of your text logo.', 'grassroots' ),
						"id" => "logo_color",
						"std" => "",
						"type" => "color");	
	
	$options['logo_color_hover'] = array( "name" => __( 'Text Logo Color (hover)', 'grassroots' ),
						"desc" => __( 'The color of your text logo while hovering.', 'grassroots' ),
						"id" => "logo_color_hover",
						"std" => "",
						"type" => "color");	
	
	$options[] = array(
		'name' => __('Shortcut Icons', 'grassroots'),
		'desc' => __('', 'grassroots'),
		'type' => 'info');
	
	$options[] = array( "name" => __( 'Favicon', 'grassroots' ),
						"desc" => __( 'Upload a favicon (small icon that sits beside your websites address in a browser navigation bar here.', 'grassroots' ),
						"id" => "favicon",
						"std" => get_template_directory_uri() ."/images/favicon.png",
						"type" => "upload");
	
	$options[] = array( "name" => __( 'Apple Shortcut Icon', 'grassroots' ),
						"desc" => __( 'Upload an icon for an iOS shortcut icon here.  Should be 114 pixels square.', 'grassroots' ),
						"id" => "apple",
						"std" => "",
						"type" => "upload");
		
	
	$options[] = array(
		'name' => __('Navigation', 'grassroots'),
		'desc' => __('', 'grassroots'),
		'type' => 'info');
	
	$options['navigation_font'] = array( 'name' => __( 'Navigation Item Font', 'grassroots' ),
			'desc' => __( 'Sets the type for your navigation menu.', 'grassroots' ),
			'id' => 'navigation_font',
			'std' => array( 'size' => '20px', 'face' => 'Open Sans, sans-serif', 'color' => '#ffffff'),
			'type' => 'typography',
			'options' => array(
				'faces' => options_typography_get_google_fonts(),
				'styles' => false,
				'color' => false )
			);
	
	$options['navigation_item'] = array( "name" => __( 'Navigation Item', 'grassroots' ),
						"desc" => __( 'Color of your navigation menu items', 'grassroots' ),
						"id" => "navigation_item",
						"std" => "",
						"type" => "color");
	
	$options['navigation_item_hover'] = array( "name" => __( 'Navigation Item (hover)', 'grassroots' ),
						"desc" => __( 'Color of your navigation menu items while hovering', 'grassroots' ),
						"id" => "navigation_item_hover",
						"std" => "",
						"type" => "color");
	
	$options['navigation_drop_down_background'] = array( "name" => __( 'Navigation Drop Down Background Color', 'grassroots' ),
						"desc" => __( 'Background color of your drop-down menus.  This also will be the background of the mobile navigation button.', 'grassroots' ),
						"id" => "navigation_drop_down_background",
						"std" => "",
						"type" => "color");
	
	$options['navigation_drop_down_color'] = array( "name" => __( 'Navigation Drop Down Link Color', 'grassroots' ),
						"desc" => __( 'Link color of your drop-down menus.  This color will also be the lines in the mobile navigation button.', 'grassroots' ),
						"id" => "navigation_drop_down_color",
						"std" => "",
						"type" => "color");
	
	$options['navigation_button_color'] = array( "name" => __( 'Navigation Button Color', 'grassroots' ),
						"desc" => __( 'Sets the color of navigation items using the button class.', 'grassroots' ),
						"id" => "navigation_button_color",
						"std" => "",
						"type" => "color");
	
	$options['navigation_button_color_hover'] = array( "name" => __( 'Navigation Button Color (Hover)', 'grassroots' ),
						"desc" => __( 'Sets the color of navigation items using the button class while hovering.', 'grassroots' ),
						"id" => "navigation_button_color_hover",
						"std" => "",
						"type" => "color");
	
	$options['navigation_drop_down_color_hover'] = array( "name" => __( 'Navigation Drop Down Link Color (Hover)', 'grassroots' ),
						"desc" => __( 'Link color of your drop-down menus while hovering.', 'grassroots' ),
						"id" => "navigation_drop_down_color_hover",
						"std" => "",
						"type" => "color");
	
	$options['drop_down_distance'] = array( "name" => __( 'Drop Down Distance','grassroots'),
						"desc" => __( 'You can use this to set the top margin of the drop down menu.  To move the sub-menu higher on the sreen use a negative number (like -10) and adjust as necessary.','grassroots'),
						"id" => "drop_down_distance",
						"std" => "",
						"type" => "text");
	
	$options['mobile_navigation_name'] = array( "name" => __( 'Mobile Navigation Label', 'grassroots' ),
						"desc" => __( 'Sets the text for the mobile navigation menu', 'grassroots' ),
						"id" => "mobile_navigation_name",
						"std" => "Menu",
						"type" => "text");
	
	
	
$options[] = array(
	'name' => __('Hero Section', 'grassroots'),
	'desc' => __('', 'grassroots'),
	'type' => 'info');	
	
	$options['hero_title_font'] = array( 'name' => __( 'Hero Title Font', 'grassroots' ),
			'desc' => __( 'Select a font for your hero section.', 'grassroots' ),
			'id' => 'hero_title_font',
			'std' => array( 'size' => '70px', 'face' => 'Open Sans, sans-serif', 'color' => '#ffffff'),
			'type' => 'typography',
			'options' => array(
				'faces' => options_typography_get_google_fonts(),
				'styles' => false,
				'color' => false )
			);
	
		
	$options['hero_text_font'] = array( 'name' => __( 'Hero Text Font', 'grassroots' ),
			'desc' => __( 'Select a font for your hero section.', 'grassroots' ),
			'id' => 'hero_text_font',
			'std' => array( 'size' => '24px', 'face' => 'Open Sans, sans-serif', 'color' => '#ffffff'),
			'type' => 'typography',
			'options' => array(
				'faces' => options_typography_get_google_fonts(),
				'styles' => false,
				'color' => false )
			);
		
	
	
	
$options[] = array( "name" => __( 'Background', 'grassroots' ),
					"desc" => __( '', 'grassroots' ),
					"type" => "heading");
	
	
	$options['background_image'] = array( "name" => __( 'Background Image', 'grassroots' ),
						"desc" => __( 'Upload a background image here.', 'grassroots' ),
						"id" => "background_image",
						"type" => "upload");
	
	$options['background_repeat'] = array( "name" => __( 'Background Repeat', 'grassroots' ),
						"desc" => __( 'Set how your background iamge repeats.', 'grassroots' ),
						"id" => "background_repeat",
						"std" => "",
						"type" => "select",
						"options" => $background_repeat);
	
	$options['background_attachment'] = array( "name" => __( 'Background Attachment', 'grassroots' ),
						"desc" => __( 'Set how your background iamge is attached.', 'grassroots' ),
						"id" => "background_attachment",
						"std" => "",
						"type" => "select",
						"options" => $background_attachment);
	
	$options['background_position_horizontal'] = array( "name" => __( 'Background Position (horizontal)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins horizontally.', 'grassroots' ),
						"id" => "background_position_horizontal",
						"std" => "",
						"type" => "select",
						"options" => $background_position_x);
	
	$options['background_position_vertical'] = array( "name" => __( 'Background Position (vertical)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins vertically.', 'grassroots' ),
						"id" => "background_position_vertical",
						"std" => "",
						"type" => "select",
						"options" => $background_position_y);
	
	$options['background_size'] = array( "name" => __( 'Background Scaling', 'grassroots' ),
						"desc" => __( 'Cover will force the background image to fill the background area.  Contain will scale the image so that both its height and width fit.', 'grassroots' ),
						"id" => "background_size",
						"std" => "",
						"type" => "select",
						"options" => $background_size);
	
	$options['background_color'] = array( "name" => __( 'Background Color', 'grassroots' ),
						"desc" => __( 'Choose a background color.', 'grassroots' ),
						"id" => "background_color",
						"std" => "#EDEDED",
						"type" => "color");	
	


$options[] = array( "name" => __( 'Home Sections', 'grassroots' ),
					"desc" => __( '', 'grassroots' ),
					"type" => "heading");
	
	$options['show_home_1'] = array(
			'name' => __('Style Home 1', 'grassroots'),
			'desc' => __('Click here to style the first home block.', 'grassroots'),
			'id' => 'show_home_1',
			'type' => 'checkbox');
	
	$options['home_1'] = array( "name" => __( 'Home 1 Background Color', 'grassroots' ),
						"desc" => __( 'Sets the background color of the first home page section', 'grassroots' ),
						"id" => "home_1",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_1_text'] = array( "name" => __( 'Home 1 Text Color', 'grassroots' ),
						"desc" => __( 'Sets the text color of the first home page section', 'grassroots' ),
						"id" => "home_1_text",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_1_link'] = array( "name" => __( 'Home 1 Link Color', 'grassroots' ),
						"desc" => __( 'Sets the link color of the first home page section', 'grassroots' ),
						"id" => "home_1_link",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_1_hover'] = array( "name" => __( 'Home 1 Link Color (hover)', 'grassroots' ),
						"desc" => __( 'Sets the link color of the first home page section while hovering', 'grassroots' ),
						"id" => "home_1_hover",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_1_image'] = array( "name" => __( 'Home 1 Background Image', 'grassroots' ),
						"desc" => __( 'Upload a background image here.', 'grassroots' ),
						"id" => "home_1_image",
						'class' => 'hidden',
						"type" => "upload");
	
	$options['home_1_repeat'] = array( "name" => __( 'Home 1 Background Repeat', 'grassroots' ),
						"desc" => __( 'Set how your background iamge repeats.', 'grassroots' ),
						"id" => "home_1_repeat",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_repeat);
	
	$options['home_1_attachment'] = array( "name" => __( 'Home 1 Background Attachment', 'grassroots' ),
						"desc" => __( 'Set how your background iamge is attached.', 'grassroots' ),
						"id" => "home_1_attachment",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_attachment);
	
	$options['home_1_position_horizontal'] = array( "name" => __( 'Home 1 Background Position (horizontal)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins horizontally.', 'grassroots' ),
						"id" => "home_1_position_horizontal",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_x);
	
	$options['home_1_position_vertical'] = array( "name" => __( 'Home 1 Background Position (vertical)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins vertically.', 'grassroots' ),
						"id" => "home_1_position_vertical",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_y);
	
	$options['home_1_size'] = array( "name" => __( 'Home 1 Background Scaling', 'grassroots' ),
						"desc" => __( 'Cover will force the background image to fill the background area.  Contain will scale the image so that both its height and width fit.', 'grassroots' ),
						"id" => "home_1_size",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_size);
	
	// Home Two
	
	$options['show_home_2'] = array(
			'name' => __('Style Home 2', 'grassroots'),
			'desc' => __('Click here to style the second home block.', 'grassroots'),
			'id' => 'show_home_2',
			'type' => 'checkbox');
	
	$options['home_2'] = array( "name" => __( 'Home 2 Background Color', 'grassroots' ),
						"desc" => __( 'Sets the background color of the second home page section', 'grassroots' ),
						"id" => "home_2",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_2_text'] = array( "name" => __( 'Home 2 Text Color', 'grassroots' ),
						"desc" => __( 'Sets the text color of the second home page section', 'grassroots' ),
						"id" => "home_2_text",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_2_link'] = array( "name" => __( 'Home 2 Link Color', 'grassroots' ),
						"desc" => __( 'Sets the link color of the second home page section', 'grassroots' ),
						"id" => "home_2_link",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_2_hover'] = array( "name" => __( 'Home 2 Link Color (hover)', 'grassroots' ),
						"desc" => __( 'Sets the link color of the second home page section while hovering', 'grassroots' ),
						"id" => "home_2_hover",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_2_image'] = array( "name" => __( 'Home 2 Background Image', 'grassroots' ),
						"desc" => __( 'Upload a background image here.', 'grassroots' ),
						"id" => "home_2_image",
						'class' => 'hidden',
						"type" => "upload");
	
	$options['home_2_repeat'] = array( "name" => __( 'Home 2 Background Repeat', 'grassroots' ),
						"desc" => __( 'Set how your background iamge repeats.', 'grassroots' ),
						"id" => "home_2_repeat",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_repeat);
	
	$options['home_2_attachment'] = array( "name" => __( 'Home 2 Background Attachment', 'grassroots' ),
						"desc" => __( 'Set how your background iamge is attached.', 'grassroots' ),
						"id" => "home_2_attachment",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_attachment);
	
	$options['home_2_position_horizontal'] = array( "name" => __( 'Home 2 Background Position (horizontal)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins horizontally.', 'grassroots' ),
						"id" => "home_2_position_horizontal",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_x);
	
	$options['home_2_position_vertical'] = array( "name" => __( 'Home 2 Background Position (vertical)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins vertically.', 'grassroots' ),
						"id" => "home_2_position_vertical",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_y);
	
	$options['home_2_size'] = array( "name" => __( 'Home 2 Background Scaling', 'grassroots' ),
						"desc" => __( 'Cover will force the background image to fill the background area.  Contain will scale the image so that both its height and width fit.', 'grassroots' ),
						"id" => "home_2_size",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_size);
	
	// Home 3
	
	$options['show_home_3'] = array(
			'name' => __('Style Home 3', 'grassroots'),
			'desc' => __('Click here to style the third home block.', 'grassroots'),
			'id' => 'show_home_3',
			'type' => 'checkbox');
	
	$options['home_3'] = array( "name" => __( 'Home 3 Background Color', 'grassroots' ),
						"desc" => __( 'Sets the background color of the third home page section', 'grassroots' ),
						"id" => "home_3",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_3_text'] = array( "name" => __( 'Home 3 Text Color', 'grassroots' ),
						"desc" => __( 'Sets the text color of the third home page section', 'grassroots' ),
						"id" => "home_3_text",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_3_link'] = array( "name" => __( 'Home 3 Link Color', 'grassroots' ),
						"desc" => __( 'Sets the link color of the third home page section', 'grassroots' ),
						"id" => "home_3_link",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_3_hover'] = array( "name" => __( 'Home 3 Link Color (hover)', 'grassroots' ),
						"desc" => __( 'Sets the link color of the third home page section while hovering', 'grassroots' ),
						"id" => "home_3_hover",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_3_image'] = array( "name" => __( 'Home 3 Background Image', 'grassroots' ),
						"desc" => __( 'Upload a background image here.', 'grassroots' ),
						"id" => "home_3_image",
						'class' => 'hidden',
						"type" => "upload");
	
	$options['home_3_repeat'] = array( "name" => __( 'Home 3 Background Repeat', 'grassroots' ),
						"desc" => __( 'Set how your background iamge repeats.', 'grassroots' ),
						"id" => "home_3_repeat",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_repeat);
	
	$options['home_3_attachment'] = array( "name" => __( 'Home 3 Background Attachment', 'grassroots' ),
						"desc" => __( 'Set how your background iamge is attached.', 'grassroots' ),
						"id" => "home_3_attachment",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_attachment);
	
	$options['home_3_position_horizontal'] = array( "name" => __( 'Home 3 Background Position (horizontal)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins horizontally.', 'grassroots' ),
						"id" => "home_3_position_horizontal",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_x);
	
	$options['home_3_position_vertical'] = array( "name" => __( 'Home 3 Background Position (vertical)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins vertically.', 'grassroots' ),
						"id" => "home_3_position_vertical",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_y);
	
	$options['home_3_size'] = array( "name" => __( 'Home 3 Background Scaling', 'grassroots' ),
						"desc" => __( 'Cover will force the background image to fill the background area.  Contain will scale the image so that both its height and width fit.', 'grassroots' ),
						"id" => "home_3_size",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_size);
	
	// Home 4
	
	$options['show_home_4'] = array(
			'name' => __('Style Home 4', 'grassroots'),
			'desc' => __('Click here to style the fourth home block.', 'grassroots'),
			'id' => 'show_home_4',
			'type' => 'checkbox');
	
	$options['home_4'] = array( "name" => __( 'Home 4 Background Color', 'grassroots' ),
						"desc" => __( 'Sets the background color of the fourth home page section', 'grassroots' ),
						"id" => "home_4",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_4_text'] = array( "name" => __( 'Home 4 Text Color', 'grassroots' ),
						"desc" => __( 'Sets the text color of the fourth home page section', 'grassroots' ),
						"id" => "home_4_text",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_4_link'] = array( "name" => __( 'Home 4 Link Color', 'grassroots' ),
						"desc" => __( 'Sets the link color of the fourth home page section', 'grassroots' ),
						"id" => "home_4_link",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_4_hover'] = array( "name" => __( 'Home 4 Link Color (hover)', 'grassroots' ),
						"desc" => __( 'Sets the link color of the fourth home page section while hovering', 'grassroots' ),
						"id" => "home_4_hover",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_4_image'] = array( "name" => __( 'Home 4 Background Image', 'grassroots' ),
						"desc" => __( 'Upload a background image here.', 'grassroots' ),
						"id" => "home_4_image",
						'class' => 'hidden',
						"type" => "upload");
	
	$options['home_4_repeat'] = array( "name" => __( 'Home 4 Background Repeat', 'grassroots' ),
						"desc" => __( 'Set how your background iamge repeats.', 'grassroots' ),
						"id" => "home_4_repeat",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_repeat);
	
	$options['home_4_attachment'] = array( "name" => __( 'Home 4 Background Attachment', 'grassroots' ),
						"desc" => __( 'Set how your background iamge is attached.', 'grassroots' ),
						"id" => "home_4_attachment",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_attachment);
	
	$options['home_4_position_horizontal'] = array( "name" => __( 'Home 4 Background Position (horizontal)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins horizontally.', 'grassroots' ),
						"id" => "home_4_position_horizontal",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_x);
	
	$options['home_4_position_vertical'] = array( "name" => __( 'Home 4 Background Position (vertical)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins vertically.', 'grassroots' ),
						"id" => "home_4_position_vertical",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_y);
	
	$options['home_4_size'] = array( "name" => __( 'Home 4 Background Scaling', 'grassroots' ),
						"desc" => __( 'Cover will force the background image to fill the background area.  Contain will scale the image so that both its height and width fit.', 'grassroots' ),
						"id" => "home_4_size",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_size);
	
	// Home 5
	
	$options['show_home_5'] = array(
			'name' => __('Style Home 5', 'grassroots'),
			'desc' => __('Click here to style the fifth home block.', 'grassroots'),
			'id' => 'show_home_5',
			'type' => 'checkbox');
	
	$options['home_5'] = array( "name" => __( 'Home 5 Background Color', 'grassroots' ),
						"desc" => __( 'Sets the background color of the fifth home page section', 'grassroots' ),
						"id" => "home_5",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_5_text'] = array( "name" => __( 'Home 5 Text Color', 'grassroots' ),
						"desc" => __( 'Sets the text color of the fifth home page section', 'grassroots' ),
						"id" => "home_5_text",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_5_link'] = array( "name" => __( 'Home 5 Link Color', 'grassroots' ),
						"desc" => __( 'Sets the link color of the fifth home page section', 'grassroots' ),
						"id" => "home_5_link",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_5_hover'] = array( "name" => __( 'Home 5 Link Color (hover)', 'grassroots' ),
						"desc" => __( 'Sets the link color of the fifth home page section while hovering', 'grassroots' ),
						"id" => "home_5_hover",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_5_image'] = array( "name" => __( 'Home 5 Background Image', 'grassroots' ),
						"desc" => __( 'Upload a background image here.', 'grassroots' ),
						"id" => "home_5_image",
						'class' => 'hidden',
						"type" => "upload");
	
	$options['home_5_repeat'] = array( "name" => __( 'Home 5 Background Repeat', 'grassroots' ),
						"desc" => __( 'Set how your background iamge repeats.', 'grassroots' ),
						"id" => "home_5_repeat",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_repeat);
	
	$options['home_5_attachment'] = array( "name" => __( 'Home 5 Background Attachment', 'grassroots' ),
						"desc" => __( 'Set how your background iamge is attached.', 'grassroots' ),
						"id" => "home_5_attachment",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_attachment);
	
	$options['home_5_position_horizontal'] = array( "name" => __( 'Home 5 Background Position (horizontal)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins horizontally.', 'grassroots' ),
						"id" => "home_5_position_horizontal",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_x);
	
	$options['home_5_position_vertical'] = array( "name" => __( 'Home 5 Background Position (vertical)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins vertically.', 'grassroots' ),
						"id" => "home_5_position_vertical",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_y);
	
	$options['home_5_size'] = array( "name" => __( 'Home 5 Background Scaling', 'grassroots' ),
						"desc" => __( 'Cover will force the background image to fill the background area.  Contain will scale the image so that both its height and width fit.', 'grassroots' ),
						"id" => "home_5_size",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_size);
	
	// Home 6
	
	$options['show_home_6'] = array(
			'name' => __('Style Home 6', 'grassroots'),
			'desc' => __('Click here to style the sixth home block.', 'grassroots'),
			'id' => 'show_home_6',
			'type' => 'checkbox');
	
	$options['home_6'] = array( "name" => __( 'Home 6 Background Color', 'grassroots' ),
						"desc" => __( 'Sets the background color of the sixth home page section', 'grassroots' ),
						"id" => "home_6",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_6_text'] = array( "name" => __( 'Home 6 Text Color', 'grassroots' ),
						"desc" => __( 'Sets the text color of the sixth home page section', 'grassroots' ),
						"id" => "home_6_text",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_6_link'] = array( "name" => __( 'Home 6 Link Color', 'grassroots' ),
						"desc" => __( 'Sets the link color of the sixth home page section', 'grassroots' ),
						"id" => "home_6_link",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_6_hover'] = array( "name" => __( 'Home 6 Link Color (hover)', 'grassroots' ),
						"desc" => __( 'Sets the link color of the sixth home page section while hovering', 'grassroots' ),
						"id" => "home_6_hover",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_6_image'] = array( "name" => __( 'Home 6 Background Image', 'grassroots' ),
						"desc" => __( 'Upload a background image here.', 'grassroots' ),
						"id" => "home_6_image",
						'class' => 'hidden',
						"type" => "upload");
	
	$options['home_6_repeat'] = array( "name" => __( 'Home 6 Background Repeat', 'grassroots' ),
						"desc" => __( 'Set how your background iamge repeats.', 'grassroots' ),
						"id" => "home_6_repeat",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_repeat);
	
	$options['home_6_attachment'] = array( "name" => __( 'Home 6 Background Attachment', 'grassroots' ),
						"desc" => __( 'Set how your background iamge is attached.', 'grassroots' ),
						"id" => "home_6_attachment",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_attachment);
	
	$options['home_6_position_horizontal'] = array( "name" => __( 'Home 6 Background Position (horizontal)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins horizontally.', 'grassroots' ),
						"id" => "home_6_position_horizontal",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_x);
	
	$options['home_6_position_vertical'] = array( "name" => __( 'Home 6 Background Position (vertical)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins vertically.', 'grassroots' ),
						"id" => "home_6_position_vertical",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_y);
	
	$options['home_6_size'] = array( "name" => __( 'Home 6 Background Scaling', 'grassroots' ),
						"desc" => __( 'Cover will force the background image to fill the background area.  Contain will scale the image so that both its height and width fit.', 'grassroots' ),
						"id" => "home_6_size",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_size);
	
	// Home 7
	
	$options['show_home_7'] = array(
			'name' => __('Style Home 7', 'grassroots'),
			'desc' => __('Click here to style the seventh home block.', 'grassroots'),
			'id' => 'show_home_7',
			'type' => 'checkbox');
	
	$options['home_7'] = array( "name" => __( 'Home 7 Background Color', 'grassroots' ),
						"desc" => __( 'Sets the background color of the seventh home page section', 'grassroots' ),
						"id" => "home_7",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_7_text'] = array( "name" => __( 'Home 7 Text Color', 'grassroots' ),
						"desc" => __( 'Sets the text color of the seventh home page section', 'grassroots' ),
						"id" => "home_7_text",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_7_link'] = array( "name" => __( 'Home 7 Link Color', 'grassroots' ),
						"desc" => __( 'Sets the link color of the seventh home page section', 'grassroots' ),
						"id" => "home_7_link",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_7_hover'] = array( "name" => __( 'Home 7 Link Color (hover)', 'grassroots' ),
						"desc" => __( 'Sets the link color of the seventh home page section while hovering', 'grassroots' ),
						"id" => "home_7_hover",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_7_image'] = array( "name" => __( 'Home 7 Background Image', 'grassroots' ),
						"desc" => __( 'Upload a background image here.', 'grassroots' ),
						"id" => "home_7_image",
						'class' => 'hidden',
						"type" => "upload");
	
	$options['home_7_repeat'] = array( "name" => __( 'Home 7 Background Repeat', 'grassroots' ),
						"desc" => __( 'Set how your background iamge repeats.', 'grassroots' ),
						"id" => "home_7_repeat",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_repeat);
	
	$options['home_7_attachment'] = array( "name" => __( 'Home 7 Background Attachment', 'grassroots' ),
						"desc" => __( 'Set how your background iamge is attached.', 'grassroots' ),
						"id" => "home_7_attachment",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_attachment);
	
	$options['home_7_position_horizontal'] = array( "name" => __( 'Home 7 Background Position (horizontal)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins horizontally.', 'grassroots' ),
						"id" => "home_7_position_horizontal",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_x);
	
	$options['home_7_position_vertical'] = array( "name" => __( 'Home 7 Background Position (vertical)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins vertically.', 'grassroots' ),
						"id" => "home_7_position_vertical",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_y);
	
	$options['home_7_size'] = array( "name" => __( 'Home 7 Background Scaling', 'grassroots' ),
						"desc" => __( 'Cover will force the background image to fill the background area.  Contain will scale the image so that both its height and width fit.', 'grassroots' ),
						"id" => "home_7_size",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_size);
	
	// Home 8
	
	$options['show_home_8'] = array(
			'name' => __('Style Home 8', 'grassroots'),
			'desc' => __('Click here to style the eighth home block.', 'grassroots'),
			'id' => 'show_home_8',
			'type' => 'checkbox');
	
	$options['home_8'] = array( "name" => __( 'Home 8 Background Color', 'grassroots' ),
						"desc" => __( 'Sets the background color of the eighth home page section', 'grassroots' ),
						"id" => "home_8",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_8_text'] = array( "name" => __( 'Home 8 Text Color', 'grassroots' ),
						"desc" => __( 'Sets the text color of the eighth home page section', 'grassroots' ),
						"id" => "home_8_text",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_8_link'] = array( "name" => __( 'Home 8 Link Color', 'grassroots' ),
						"desc" => __( 'Sets the link color of the eighth home page section', 'grassroots' ),
						"id" => "home_8_link",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_8_hover'] = array( "name" => __( 'Home 8 Link Color (hover)', 'grassroots' ),
						"desc" => __( 'Sets the link color of the eighth home page section while hovering', 'grassroots' ),
						"id" => "home_8_hover",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_8_image'] = array( "name" => __( 'Home 8 Background Image', 'grassroots' ),
						"desc" => __( 'Upload a background image here.', 'grassroots' ),
						"id" => "home_8_image",
						'class' => 'hidden',
						"type" => "upload");
	
	$options['home_8_repeat'] = array( "name" => __( 'Home 8 Background Repeat', 'grassroots' ),
						"desc" => __( 'Set how your background iamge repeats.', 'grassroots' ),
						"id" => "home_8_repeat",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_repeat);
	
	$options['home_8_attachment'] = array( "name" => __( 'Home 8 Background Attachment', 'grassroots' ),
						"desc" => __( 'Set how your background iamge is attached.', 'grassroots' ),
						"id" => "home_8_attachment",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_attachment);
	
	$options['home_8_position_horizontal'] = array( "name" => __( 'Home 8 Background Position (horizontal)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins horizontally.', 'grassroots' ),
						"id" => "home_8_position_horizontal",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_x);
	
	$options['home_8_position_vertical'] = array( "name" => __( 'Home 8 Background Position (vertical)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins vertically.', 'grassroots' ),
						"id" => "home_8_position_vertical",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_y);
	
	$options['home_8_size'] = array( "name" => __( 'Home 8 Background Scaling', 'grassroots' ),
						"desc" => __( 'Cover will force the background image to fill the background area.  Contain will scale the image so that both its height and width fit.', 'grassroots' ),
						"id" => "home_8_size",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_size);
	
	// Home 9
	
	$options['show_home_9'] = array(
			'name' => __('Style Home 9', 'grassroots'),
			'desc' => __('Click here to style the ninth home block.', 'grassroots'),
			'id' => 'show_home_9',
			'type' => 'checkbox');
	
	$options['home_9'] = array( "name" => __( 'Home 9 Background Color', 'grassroots' ),
						"desc" => __( 'Sets the background color of the ninth home page section', 'grassroots' ),
						"id" => "home_9",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_9_text'] = array( "name" => __( 'Home 9 Text Color', 'grassroots' ),
						"desc" => __( 'Sets the text color of the ninth home page section', 'grassroots' ),
						"id" => "home_9_text",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_9_link'] = array( "name" => __( 'Home 9 Link Color', 'grassroots' ),
						"desc" => __( 'Sets the link color of the ninth home page section', 'grassroots' ),
						"id" => "home_9_link",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_9_hover'] = array( "name" => __( 'Home 9 Link Color (hover)', 'grassroots' ),
						"desc" => __( 'Sets the link color of the ninth home page section while hovering', 'grassroots' ),
						"id" => "home_9_hover",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_9_image'] = array( "name" => __( 'Home 9 Background Image', 'grassroots' ),
						"desc" => __( 'Upload a background image here.', 'grassroots' ),
						"id" => "home_9_image",
						'class' => 'hidden',
						"type" => "upload");
	
	$options['home_9_repeat'] = array( "name" => __( 'Home 9 Background Repeat', 'grassroots' ),
						"desc" => __( 'Set how your background iamge repeats.', 'grassroots' ),
						"id" => "home_9_repeat",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_repeat);
	
	$options['home_9_attachment'] = array( "name" => __( 'Home 9 Background Attachment', 'grassroots' ),
						"desc" => __( 'Set how your background iamge is attached.', 'grassroots' ),
						"id" => "home_9_attachment",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_attachment);
	
	$options['home_9_position_horizontal'] = array( "name" => __( 'Home 9 Background Position (horizontal)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins horizontally.', 'grassroots' ),
						"id" => "home_9_position_horizontal",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_x);
	
	$options['home_9_position_vertical'] = array( "name" => __( 'Home 9 Background Position (vertical)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins vertically.', 'grassroots' ),
						"id" => "home_9_position_vertical",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_y);
	
	$options['home_9_size'] = array( "name" => __( 'Home 9 Background Scaling', 'grassroots' ),
						"desc" => __( 'Cover will force the background image to fill the background area.  Contain will scale the image so that both its height and width fit.', 'grassroots' ),
						"id" => "home_9_size",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_size);
	
	// Home 10
	
	$options['show_home_10'] = array(
			'name' => __('Style Home 10', 'grassroots'),
			'desc' => __('Click here to style the tenth home block.', 'grassroots'),
			'id' => 'show_home_10',
			'type' => 'checkbox');
	
	$options['home_10'] = array( "name" => __( 'Home 10 Background Color', 'grassroots' ),
						"desc" => __( 'Sets the background color of the tenth home page section', 'grassroots' ),
						"id" => "home_10",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_10_text'] = array( "name" => __( 'Home 10 Text Color', 'grassroots' ),
						"desc" => __( 'Sets the text color of the tenth home page section', 'grassroots' ),
						"id" => "home_10_text",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_10_link'] = array( "name" => __( 'Home 10 Link Color', 'grassroots' ),
						"desc" => __( 'Sets the link color of the tenth home page section', 'grassroots' ),
						"id" => "home_10_link",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_10_hover'] = array( "name" => __( 'Home 10 Link Color (hover)', 'grassroots' ),
						"desc" => __( 'Sets the link color of the tenth home page section while hovering', 'grassroots' ),
						"id" => "home_10_hover",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");
	
	$options['home_10_image'] = array( "name" => __( 'Home 10 Background Image', 'grassroots' ),
						"desc" => __( 'Upload a background image here.', 'grassroots' ),
						"id" => "home_10_image",
						'class' => 'hidden',
						"type" => "upload");
	
	$options['home_10_repeat'] = array( "name" => __( 'Home 10 Background Repeat', 'grassroots' ),
						"desc" => __( 'Set how your background iamge repeats.', 'grassroots' ),
						"id" => "home_10_repeat",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_repeat);
	
	$options['home_10_attachment'] = array( "name" => __( 'Home 10 Background Attachment', 'grassroots' ),
						"desc" => __( 'Set how your background iamge is attached.', 'grassroots' ),
						"id" => "home_10_attachment",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_attachment);
	
	$options['home_10_position_horizontal'] = array( "name" => __( 'Home 10 Background Position (horizontal)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins horizontally.', 'grassroots' ),
						"id" => "home_10_position_horizontal",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_x);
	
	$options['home_10_position_vertical'] = array( "name" => __( 'Home 10 Background Position (vertical)', 'grassroots' ),
						"desc" => __( 'Chose where the background image begins vertically.', 'grassroots' ),
						"id" => "home_10_position_vertical",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_position_y);
	
	$options['home_10_size'] = array( "name" => __( 'Home 10 Background Scaling', 'grassroots' ),
						"desc" => __( 'Cover will force the background image to fill the background area.  Contain will scale the image so that both its height and width fit.', 'grassroots' ),
						"id" => "home_10_size",
						"std" => "",
						"type" => "select",
						'class' => 'hidden',
						"options" => $background_size);
	

			
	

$options[] = array( "name" => __( 'Content', 'grassroots' ),
					"desc" => __( '', 'grassroots' ),
					"type" => "heading");
	
	
	$options['default_layout'] = array(
			'name' => __( 'Default Layout', 'grassroots' ),
			'desc' => __( 'Choose a default layout for your pages and posts.', 'grassroots' ),
			'id' => "default_layout",
			'std' => "content-left",
			'type' => "images",
			'options' => array(
				'content-left' => $imagepath . '2cr.png',
				'content-full' => $imagepath . '1col.png',
				'content-right' => $imagepath . '2cl.png')
		);
	
	$options['content_excerpt'] = array( "name" => __( 'Excerpt Or Full Content', 'grassroots' ),
						"desc" => __( 'You can choose to display your full post content or only an excerpt on archive pages.', 'grassroots' ),
						"id" => "content_excerpt",
						"std" => "yes",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $content_type);
						
	$options['gallery'] = array( "name" => __( 'Include Lightbox Gallery', 'grassroots' ),
						"desc" => __( 'If you would like to disable the lightbox gallery, select no here.', 'grassroots' ),
						"id" => "gallery",
						"std" => "yes",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $yes);
	
	$options['lightbox_style'] = array( "name" => __( 'Lightbox Style', 'grassroots' ),
						"desc" => __( 'Choose a style for the pop-up lightbox.', 'grassroots' ),
						"id" => "lightbox_style",
						"std" => "classic",
						"type" => "select",
						"class" => "tiny", //mini, tiny, small
						"options" => $light_style);
	
	
	
	$options[] = array(
		'name' => __('Main Content Styles', 'grassroots'),
		'desc' => __('', 'grassroots'),
		'type' => 'info');
	
	$options['body_font'] = array( 'name' => __( 'Body Font', 'grassroots' ),
			'desc' => __( 'This is used for the main conent and widgets.', 'grassroots' ),
			'id' => 'body_font',
			'std' => array( 'size' => '15px', 'face' => 'Open Sans, sans-serif', 'color' => '#000000'),
			'type' => 'typography',
			'options' => array(
				'faces' => options_typography_get_google_fonts(),
				'styles' => false,
				'color' => false )
			);
	
	$options['content_text'] = array( "name" => __( 'Text Color', 'grassroots' ),
						"desc" => __( 'The color of your main text', 'grassroots' ),
						"id" => "content_text",
						"std" => "",
						"type" => "color");	
	
	$options['content_background'] = array( "name" => __( 'Content Background Color', 'grassroots' ),
						"desc" => __( 'The background color of the main content area of the site.', 'grassroots' ),
						"id" => "content_background",
						"std" => "",
						"type" => "color");	
		
	$options['heading_font'] = array( 'name' => __( 'Heading Font', 'grassroots' ),
			'desc' => __( 'Choose a font for your page titles and other headings (h1, h2, h3, h4, h5, h6)', 'grassroots' ),
			'id' => 'heading_font',
			'std' => array( 'size' => '24px', 'face' => 'Open Sans, sans-serif', 'color' => '#000000'),
			'type' => 'typography',
			'options' => array(
				'faces' => options_typography_get_google_fonts(),
				'styles' => false,
				'sizes' => false,
				'color' => false )
			);
	
	$options['heading_color'] = array( "name" => __( 'Heading Color', 'grassroots' ),
						"desc" => __( 'The color of your headings', 'grassroots' ),
						"id" => "heading_color",
						"std" => "",
						"type" => "color");	
	
	
	$options[] = array(
		'name' => __('Links', 'grassroots'),
		'desc' => __('', 'grassroots'),
		'type' => 'info');
	
	$options['link_color'] = array( "name" => __( 'Link Color', 'grassroots' ),
						"desc" => __( 'Choose a link color', 'grassroots' ),
						"id" => "link_color",
						"std" => "",
						"type" => "color");	
	
	$options['link_color_hover'] = array( "name" => __( 'Link Color (hover)', 'grassroots' ),
						"desc" => __( 'Choose a link color while hovering', 'grassroots' ),
						"id" => "link_color_hover",
						"std" => "",
						"type" => "color");



	$options[] = array(
		'name' => __('Products', 'grassroots'),
		"desc" => '',
		'type' => 'info');
	
	$options['price_color'] = array( "name" => __( 'Price Color', 'grassroots' ),
						"desc" => __( 'Sets the color of the product cost text.', 'grassroots' ),
						"id" => "price_color",
						"std" => "",
						"type" => "color");
	
	$options['sale_background'] = array( "name" => __( 'Sale Button Background Color', 'grassroots' ),
						"desc" => __( 'The background color of the on-sale indicator.', 'grassroots' ),
						"id" => "sale_background",
						"std" => "",
						"type" => "color");
	
	$options['sale_text'] = array( "name" => __( 'Sale Button Text Color', 'grassroots' ),
						"desc" => __( 'The text color of the on-sale indicator.', 'grassroots' ),
						"id" => "sale_text",
						"std" => "",
						"type" => "color");



	
	
	
$options[] = array(
		'name' => __('Buttons', 'grassroots'),
		'desc' => '',
		'type' => 'heading');
	
	$options['button'] = array( "name" => __( 'Button Text', 'grassroots' ),
						"desc" => __( 'Text color for buttons.', 'grassroots' ),
						"id" => "button",
						"std" => "",
						"type" => "color");
	
	$options['button_background'] = array( "name" => __( 'Button Background', 'grassroots' ),
						"desc" => __( 'Background color for buttons.', 'grassroots' ),
						"id" => "button_background",
						"std" => "",
						"type" => "color");
	
	$options['button_hover'] = array( "name" => __( 'Button Text (hover)', 'grassroots' ),
						"desc" => __( 'Text color for buttons while hovering.', 'grassroots' ),
						"id" => "button_hover",
						"std" => "",
						"type" => "color");
	
	$options['button_background_hover'] = array( "name" => __( 'Button Background (hover)', 'grassroots' ),
						"desc" => __( 'Background color for buttons while hovering.', 'grassroots' ),
						"id" => "button_background_hover",
						"std" => "",
						"type" => "color");

	$options['alt_button'] = array( "name" => __( 'Alternative Button Text', 'grassroots' ),
						"desc" => __( 'Text color for alt buttons in WooCommerce.  The add to cart button on the product page is one.', 'grassroots' ),
						"id" => "alt_button",
						"std" => "",
						"type" => "color");
	
	$options['alt_button_background'] = array( "name" => __( 'Alternative Button Background', 'grassroots' ),
						"desc" => __( 'Background color for alt buttons.', 'grassroots' ),
						"id" => "alt_button_background",
						"std" => "",
						"type" => "color");
	
	$options['alt_button_hover'] = array( "name" => __( 'Alternative Button Text (hover)', 'grassroots' ),
						"desc" => __( 'Text color for alt buttons while hovering.', 'grassroots' ),
						"id" => "alt_button_hover",
						"std" => "",
						"type" => "color");
	
	$options['alt_button_background_hover'] = array( "name" => __( 'Alternative Button Background (hover)', 'grassroots' ),
						"desc" => __( 'Background color for alt buttons while hovering.', 'grassroots' ),
						"id" => "alt_button_background_hover",
						"std" => "",
						"type" => "color");
	
	
	
$options[] = array( "name" => __( 'Footer', 'grassroots' ),
					"desc" => '',
					"type" => "heading");

	$options['footer_layout'] = array( "name" => __( 'Footer Layout Style', 'grassroots' ),
						//"desc" => __( 'Select how many columns the footer should have.', 'grassroots' ),
						"id" => "footer_layout",
						"std" => "",
						"type" => "select",
						"options" => array(
							"noopt" => __( ' ', 'grassroots' ),
							"full-footer" => __( 'Full-Width Layout', 'grassroots' ),
							"compact-footer" => __( 'Compact Layout', 'grassroots' )
						)
					);

	$options['footer_col_nr'] = array( "name" => __( 'Footer Columns Number', 'grassroots' ),
						"desc" => __( 'Select how many columns the footer should have.', 'grassroots' ),
						"id" => "footer_col_nr",
						"std" => "",
						"type" => "select",
						"options" => array(
							"nocol" => __( ' ', 'grassroots' ),
							"one" => __( 'One Column', 'grassroots' ),
							"two" => __( 'Two Column', 'grassroots' ),
							"three" => __( 'Three Column', 'grassroots' ),
							"four" => __( 'Four Column', 'grassroots' )
						)
					);
	
	$options['footer_text'] = array( "name" => __( 'Custom Footer Text (Left)', 'grassroots' ),
						"desc" => __( 'The text you enter here will be displayed in the left hand side of the footer.  To use HTML, use the "text" tab.', 'grassroots' ),
						"id" => "footer_text",
						"std" => "",
						'type' => 'editor',
						'settings' => $wp_editor_settings );
	
	$options['footer_text_right'] = array( "name" => __( 'Custom Footer Text (Right)', 'grassroots' ),
						"desc" => __( 'The text you enter here will be displayed in the right hand side of the footer.  If you\'d like to use a navigation menu instead, leave this blank and add a menu to the footer menu area.  To use HTML, use the "text" tab.', 'grassroots' ),
						"id" => "footer_text_right",
						"std" => "",
						'type' => 'editor',
						'settings' => $wp_editor_settings );
			
	$options['footer_color'] = array( "name" => __( 'Footer Text Color', 'grassroots' ),
						"desc" => __( 'Your footer text color', 'grassroots' ),
						"id" => "footer_color",
						"std" => "",
						"type" => "color");
	
	$options['footer_link_color'] = array( "name" => __( 'Footer Link Color', 'grassroots' ),
						"desc" => __( 'The color of links in your footer.', 'grassroots' ),
						"id" => "footer_link_color",
						"std" => "",
						"type" => "color");
	
	$options['footer_link_color_hover'] = array( "name" => __( 'Footer Link Color (Hover)', 'grassroots' ),
						"desc" => __( 'The color of links in your footer while hovering.', 'grassroots' ),
						"id" => "footer_link_color_hover",
						"std" => "",
						"type" => "color");
	
	$options['footer_background_color'] = array( "name" => __( 'Footer Background Color', 'grassroots' ),
						"desc" => __( 'The background color of the footer.', 'grassroots' ),
						"id" => "footer_background_color",
						"std" => "",
						"type" => "color");		
	
	


// Widget Options						
	$options[] = array( "name" => __( 'Widgets', 'grassroots' ),
						"type" => "heading");
	
	
	$options['widget_title_font'] = array( 'name' => __( 'Widget Title Font', 'grassroots' ),
			'desc' => __( 'The heading at the top of a widget.', 'grassroots' ),
			'id' => 'widget_title_font',
			'std' => array( 'size' => '24px', 'face' => 'Open Sans, sans-serif', 'color' => '#000000'),
			'type' => 'typography',
			'options' => array(
				'faces' => options_typography_get_google_fonts(),
				'styles' => false,
				'color' => false )
			);
	
	$options['widget_title'] = array( "name" => __( 'Widget Title', 'grassroots' ),
						"desc" => __( 'The color of your widget titles.', 'grassroots' ),
						"id" => "widget_title",
						"std" => "",
						"type" => "color");
	
	$options['widget_text'] = array( "name" => __( 'Widget Text', 'grassroots' ),
						"desc" => __( 'Color for the text in your widgets.', 'grassroots' ),
						"id" => "widget_text",
						"std" => "",
						"type" => "color");
	
	
	$options['donate_base_color'] = array( "name" => __( 'Donation Widget Base Color', 'grassroots' ),
						"desc" => __( 'The base color of donation graph.', 'grassroots' ),
						"id" => "donate_base_color",
						"std" => "",
						"type" => "color");	
	
	$options['donate_progress_color'] = array( "name" => __( 'Donation Widget Progress Color', 'grassroots' ),
						"desc" => __( 'The progress color of donation graph.', 'grassroots' ),
						"id" => "donate_progress_color",
						"std" => "",
						"type" => "color");	


	

	

	



$options[] = array( "name" => __( 'Advanced', 'grassroots' ),
					"type" => "heading");	
	
	$options[] = array( "name" => __( 'URL Slug For Staff Members', 'grassroots' ),
						"desc" => __( 'You can enter a new slug for your staff member\'s individual URL\'s here.  Must be all lowercase with no special characters or spaces.  After changing this you will need to resave your permalinks to prevent not found errors.', 'grassroots' ),
						"id" => "staff_slug",
						"std" => "staff",
						"type" => "text");
	
	
	$options[] = array( "name" => __( 'URL Slug For Staff Groups', 'grassroots' ),
						"desc" => __( 'You can enter a new slug for your staff group\'s URL here.  Must be all lowercase with no special characters or spaces.  After changing this you will need to resave your permalinks to prevent not found errors.', 'grassroots' ),
						"id" => "staff_group_slug",
						"std" => "staff-group",
						"type" => "text");
						
	
	$options[] = array( "name" => __( 'URL Slug For Sponsors', 'grassroots' ),
						"desc" => __( 'You can enter a new slug for your sponsor\'s individual URL\'s here.  Must be all lowercase with no special characters or spaces.  After changing this you will need to resave your permalinks to prevent not found errors.', 'grassroots' ),
						"id" => "sponsor_slug",
						"std" => "sponsor",
						"type" => "text");
	
	
	$options[] = array( "name" => __( 'URL Slug For Sponsor Groups', 'grassroots' ),
						"desc" => __( 'You can enter a new slug for your sponsor group\'s URL here.  Must be all lowercase with no special characters or spaces.  After changing this you will need to resave your permalinks to prevent not found errors.', 'grassroots' ),
						"id" => "sponsor_group_slug",
						"std" => "sponsor-group",
						"type" => "text");
	
	
	
	$options[] = array( 'name' => __( 'Disable Theme Updates', 'grassroots' ),
		'desc' => __( 'Disables the theme updater feature.', 'grassroots' ),
		'id' => 'disable_theme_updater',
		'std' => false,
		'type' => 'checkbox' );				
	
	$options[] = array( 'name' => __( 'Disable Google Fonts', 'grassroots' ),
		'desc' => __( 'Turns off the output of Google fonts.', 'grassroots' ),
		'id' => 'disable_fonts',
		'std' => false,
		'type' => 'checkbox' );
				
							
	$options['custom_css'] = array( "name" => __( 'Custom CSS', 'grassroots' ),
		"desc" => __( 'Add any custom CSS you would like to use here.', 'grassroots' ),
		"id" => "custom_css",
		"std" => "",
		"type" => "textarea"); 
		
						
	return $options;
}

