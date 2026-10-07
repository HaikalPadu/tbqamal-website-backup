<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category Grassroots
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'grassroots_meta_boxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function grassroots_meta_boxes( array $meta_boxes ) {
	
	// Layout Metabox
		$meta_boxes[] = array(
			'id'         => 'layout_metabox',
			'title'      => __( 'Layouts', 'grassroots' ),
			'pages'      => array( 'page', 'post', 'product', ), // Post type
			'context'    => 'side',
			'priority'   => 'low',
			'show_names' => false, // Show field names on the left
			'fields'     => array(
				array(
					'name' => __( 'Layout', 'grassroots' ),
					'desc' => '',
					'id'   => 'page_layout',
					'type'    => 'select',
							'options' => array(
								array( 'name' => __( 'Default (set in theme options)', 'grassroots' ), 'value' => 'default', ),
								array( 'name' => __( 'Left Content/Right Sidebar', 'grassroots' ), 'value' => 'content-left', ),
								array( 'name' => __( 'Right Content/Left Sidebar', 'grassroots' ), 'value' => 'content-right', ),
								array( 'name' => __( 'Full Content (no sidebar)', 'grassroots' ), 'value' => 'content-full', ),
							),
				),
							
			),
		);

	// Hero Metabox
		$meta_boxes['hero_options'] = array(
			'id'         => 'hero_options',
			'title'      => __( 'Hero Area Options', 'grassroots' ),
			'pages'      => array( 'page', 'product'), // Post type
			'context'    => 'normal',
			'priority'   => 'low',
			'show_names' => true, // Show field names on the left
			'fields'     => array(
				
				array(
					'name' => __( 'Hero Type', 'grassroots' ),
					'desc' => '',
					'id'   => 'hero_type',
					'type'    => 'select',
							'options' => array(
								array( 'name' => __( 'No Hero', 'grassroots' ), 'value' => '', ),
								array( 'name' => __( 'Image', 'grassroots' ), 'value' => 'image', ),
								array( 'name' => __( 'Video', 'grassroots' ), 'value' => 'video', ),
							),
				),
				
				array(
					'name' => __( 'Background Image', 'grassroots' ),
					'desc' => __( 'Upload a background image or enter a URL to one.  This will also serve as the poster for a video background.', 'grassroots' ),
					'id'   => 'hero_image',
					'type' => 'file',
				),
				
				array(
					'name' => __( 'Mobile Only Background Image', 'grassroots' ),
					'desc' => __( 'This image will be used on smaller screens', 'grassroots' ),
					'id'   => 'hero_image_mobile',
					'type' => 'file',
				),
				
				array(
					'name' => __( 'YouTube Background Video URL', 'grassroots' ),
					'desc' => __( 'To use a YouTube video as the hero background, enter the URL to the video here.', 'grassroots' ),
					'id'   => 'hero_youtube',
					'type' => 'text',
				),
				
				array(
					'name' => __( 'MP4 Video Background', 'grassroots' ),
					'desc' => __( 'Upload a mp4 video or enter the URL to one here.', 'grassroots' ),
					'id'   => 'hero_mp4',
					'type' => 'file',
				),
				
				array(
					'name' => __( 'WebM Video Background', 'grassroots' ),
					'desc' => __( 'Upload a webm video or enter the URL to one here.', 'grassroots' ),
					'id'   => 'hero_webm',
					'type' => 'file',
				),
				
				array(
					'name' => __( 'Ogg Video Background', 'grassroots' ),
					'desc' => __( 'Upload a ogg video or enter the URL to one here.', 'grassroots' ),
					'id'   => 'hero_ogg',
					'type' => 'file',
				),
				
				array(
					'name' => __( 'Mute Audio', 'grassroots' ),
					'desc' => __( 'Check this box to mute the audio in your video.', 'grassroots' ),
					'id'   => 'mute',
					'type' => 'checkbox',
				),
				
				array(
					'name' => __( 'Disable Video Loop', 'grassroots' ),
					'desc' => __( 'Turns off automatic looping of the video', 'grassroots' ),
					'id'   => 'disable_loop',
					'type' => 'checkbox',
					'std'  => ''
				),
				
				array(
					'name' => __( 'Hero Logo', 'grassroots' ),
					'desc' => __( 'If you\'d like to use an image file for your hero title, upload it here.', 'grassroots' ),
					'id'   => 'hero_logo',
					'type' => 'file',
				),
				
				array(
					'name' => __( 'Hero Title', 'grassroots' ),
					'desc' => '',
					'id'   => 'hero_title',
					'type' => 'text',
				),
				
				array(
					'name' => __( 'Hero Caption', 'grassroots' ),
					'desc' => '',
					'id'   => 'hero_caption',
					'type' => 'text',
				),	
				
				array(
					'name' => __( 'Hero Button Text', 'grassroots' ),
					'desc' => '',
					'id'   => 'hero_button_text',
					'type' => 'text',
				),
				
				array(
					'name' => __( 'Hero Button URL', 'grassroots' ),
					'desc' => '',
					'id'   => 'hero_button_url',
					'type' => 'text',
				),
				
				array(
					'name' => __( 'Alignment', 'grassroots' ),
					'desc' => '',
					'id'   => 'hero_alignment',
					'type'    => 'select',
							'options' => array(
								array( 'name' => __( 'Left', 'grassroots' ), 'value' => 'left-text', ),
								array( 'name' => __( 'Center', 'grassroots' ), 'value' => 'center-text', ),
								array( 'name' => __( 'Right', 'grassroots' ), 'value' => 'right-text', ),
							),
				),
				
				array(
					'name' => __( 'Hero Height', 'grassroots' ),
					'desc' => '',
					'id'   => 'hero_height',
					'type'    => 'select',
							'options' => array(
								array( 'name' => __( 'Normal', 'grassroots' ), 'value' => 'normal-height', ),
								array( 'name' => __( 'Small', 'grassroots' ), 'value' => 'small-height', ),
								array( 'name' => __( 'Full', 'grassroots' ), 'value' => 'full-height', ),
							),
				),
				
				array(
				    'name' => __( 'Title Color', 'grassroots' ),
				    'desc' => __( 'Sets the color of the title.', 'grassroots' ),
				    'id'   => 'hero_title_color',
				    'type' => 'colorpicker',
					'std'  => ''
				),
				
				
				array(
				    'name' => __( 'Caption Color', 'grassroots' ),
				    'desc' => __( 'Sets the color of the caption.', 'grassroots' ),
				    'id'   => 'hero_caption_color',
				    'type' => 'colorpicker',
					'std'  => ''
				),
				
				array(
				    'name' => __( 'Button Color', 'grassroots' ),
				    'desc' => __( 'Sets the text color of your button text and border.', 'grassroots' ),
				    'id'   => 'hero_button_text_color',
				    'type' => 'colorpicker',
					'std'  => ''
				),
				
				array(
				    'name' => __( 'Button Background Color', 'grassroots' ),
				    'desc' => __( 'Sets the background color of your button text and border.', 'grassroots' ),
				    'id'   => 'hero_button_background_color',
				    'type' => 'colorpicker',
					'std'  => ''
				),
				
				array(
				    'name' => __( 'Button Color Hover', 'grassroots' ),
				    'desc' => __( 'Sets the text color of your button text and border while hovering.', 'grassroots' ),
				    'id'   => 'hero_button_text_hover',
				    'type' => 'colorpicker',
					'std'  => ''
				),
				
				array(
				    'name' => __( 'Button Background Color Hover', 'grassroots' ),
				    'desc' => __( 'Sets the background color of your button text and border while hovering.', 'grassroots' ),
				    'id'   => 'hero_button_background_hover',
				    'type' => 'colorpicker',
					'std'  => ''
				),
				
				array(
					'name' => __( 'Alternate Logo', 'grassroots' ),
					'desc' => __( 'If you need to use a different site logo on this page you can add it here.', 'grassroots' ),
					'id'   => 'alt_logo',
					'type' => 'file',
				),
				
				array(
				    'name' => __( 'Text Logo Color', 'grassroots' ),
				    'desc' => __( 'Sets the color of the text logo.', 'grassroots' ),
				    'id'   => 'hero_logo_color',
				    'type' => 'colorpicker',
					'std'  => ''
				),
				
				array(
				    'name' => __( 'Text Logo Color (Hover)', 'grassroots' ),
				    'desc' => __( 'Sets the hover color of the text logo.', 'grassroots' ),
				    'id'   => 'hero_logo_color_hover',
				    'type' => 'colorpicker',
					'std'  => ''
				),
				
				array(
				    'name' => __( 'Navigation Color', 'grassroots' ),
				    'desc' => __( 'Sets the color of the navigation items.', 'grassroots' ),
				    'id'   => 'hero_navigation_color',
				    'type' => 'colorpicker',
					'std'  => ''
				),
				
				array(
				    'name' => __( 'Navigation Color (Hover)', 'grassroots' ),
				    'desc' => __( 'Sets the color of the navigation items while hovering.', 'grassroots' ),
				    'id'   => 'hero_navigation_color_hover',
				    'type' => 'colorpicker',
					'std'  => ''
				),
				
				array(
				    'name' => __( 'Navigation Button Color', 'grassroots' ),
				    'desc' => __( 'Sets the color of a "button" navigation menu item.', 'grassroots' ),
				    'id'   => 'hero_navigation_button',
				    'type' => 'colorpicker',
					'std'  => ''
				),
				
				array(
				    'name' => __( 'Navigation Button Color (Hover)', 'grassroots' ),
				    'desc' => __( 'Sets the color of a "button" navigation menu item while hovering.', 'grassroots' ),
				    'id'   => 'hero_navigation_button_hover',
				    'type' => 'colorpicker',
					'std'  => ''
				),
				
				array(
				    'name' => __( 'Navigation Drop-Down Background', 'grassroots' ),
				    'desc' => __( 'Sets the background color of the navigation drop-down menu.', 'grassroots' ),
				    'id'   => 'hero_navigation_drop_background',
				    'type' => 'colorpicker',
					'std'  => ''
				),
				
				array(
				    'name' => __( 'Navigation Drop-Down Item Color', 'grassroots' ),
				    'desc' => __( 'Sets the color of the drop-down navigation item\'s color.', 'grassroots' ),
				    'id'   => 'hero_navigation_drop_item',
				    'type' => 'colorpicker',
					'std'  => ''
				),
				
				array(
				    'name' => __( 'Navigation Drop-Down Item Color (Hover)', 'grassroots' ),
				    'desc' => __( 'Sets the color of the drop-down navigation item\'s color while hovering.', 'grassroots' ),
				    'id'   => 'hero_navigation_drop_item_hover',
				    'type' => 'colorpicker',
					'std'  => ''
				),
	
			),
		);
	
	// Staff Metabox
		$meta_boxes['staff_metabox'] = array(
			'id'         => 'staff_metabox',
			'title'      => __( 'Staff Details', 'grassroots' ),
			'pages'      => array( 'staff', ), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, // Show field names on the left
			'fields'     => array(
				array(
					'name' => __( 'Job Title', 'grassroots' ),
					'desc' => '',
					'id'   => 'title',
					'type' => 'text',
				),
				
				array(
					'name' => __( 'Email Address', 'grassroots' ),
					'desc' => '',
					'id'   => 'email',
					'type' => 'text',
				),	
				
				array(
					'name' => __( 'Phone Number', 'grassroots' ),
					'desc' => '',
					'id'   => 'phone',
					'type' => 'text',
				),	
				
				array(
					'name' => __( 'Network 1 Link', 'grassroots' ),
					'desc' => '',
					'id'   => 'network_1_link',
					'type' => 'text',
				),
				
				array(
					'name' => __( 'Network 2 Link', 'grassroots' ),
					'desc' => '',
					'id'   => 'network_2_link',
					'type' => 'text',
				),
				
				array(
					'name' => __( 'Network 3 Link', 'grassroots' ),
					'desc' => '',
					'id'   => 'network_3_link',
					'type' => 'text',
				),
				
				array(
					'name' => __( 'Network 4 Link', 'grassroots' ),
					'desc' => '',
					'id'   => 'network_4_link',
					'type' => 'text',
				),
				
				array(
					'name' => __( 'Network 5 Link', 'grassroots' ),
					'desc' => '',
					'id'   => 'network_5_link',
					'type' => 'text',
				),
				
				array(
					'name' => __( 'Network 6 Link', 'grassroots' ),
					'desc' => '',
					'id'   => 'network_6_link',
					'type' => 'text',
				),	
				
				array(
					'name' => __( 'Network 7 Link', 'grassroots' ),
					'desc' => '',
					'id'   => 'network_7_link',
					'type' => 'text',
				),	
				
			),
		);
	
	// Sponsor Metabox
		$meta_boxes['sponsor_metabox'] = array(
			'id'         => 'sponsor_metabox',
			'title'      => __( 'Sponsor Details', 'grassroots' ),
			'pages'      => array( 'sponsor', ), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, // Show field names on the left
			'fields'     => array(
				
				array(
					'name' => __( 'Website', 'grassroots' ),
					'desc' => 'Leave out the http:// for this one only.',
					'id'   => 'website',
					'type' => 'text',
				),	
				
				array(
					'name' => __( 'Phone Number', 'grassroots' ),
					'desc' => '',
					'id'   => 'phone',
					'type' => 'text',
				),	
				
				array(
					'name' => __( 'Network 1 Link', 'grassroots' ),
					'desc' => '',
					'id'   => 'network_1_link',
					'type' => 'text',
				),
				
				array(
					'name' => __( 'Network 2 Link', 'grassroots' ),
					'desc' => '',
					'id'   => 'network_2_link',
					'type' => 'text',
				),
				
				array(
					'name' => __( 'Network 3 Link', 'grassroots' ),
					'desc' => '',
					'id'   => 'network_3_link',
					'type' => 'text',
				),
				
				array(
					'name' => __( 'Network 4 Link', 'grassroots' ),
					'desc' => '',
					'id'   => 'network_4_link',
					'type' => 'text',
				),
				
				array(
					'name' => __( 'Network 5 Link', 'grassroots' ),
					'desc' => '',
					'id'   => 'network_5_link',
					'type' => 'text',
				),
				
				array(
					'name' => __( 'Network 6 Link', 'grassroots' ),
					'desc' => '',
					'id'   => 'network_6_link',
					'type' => 'text',
				),	
				
				array(
					'name' => __( 'Network 7 Link', 'grassroots' ),
					'desc' => '',
					'id'   => 'network_7_link',
					'type' => 'text',
				),	
				
			),
		);
		

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
