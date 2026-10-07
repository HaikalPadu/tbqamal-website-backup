<?php

/**
 * Adds support for shortcodes used by the theme
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 *
 */

	// PayPal Donate Shortcode
		function grassroots_paypal_donation_shortcode( $atts ) {
		
		    extract(shortcode_atts(array(
		        'label' => 'Make a donation',
		        'email' => 'Account Email Address',
		        'for' => 'Donation',
		    ), $atts));
		
		    global $post;
		
		    if (!$for) $for = str_replace(" ","+",$post->post_title);
		
		    return '<p><a class="button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$email.'&item_name='.$for.'">'.$label.'</a></p>';
		
		}
		
		add_shortcode('donate-paypal', 'grassroots_paypal_donation_shortcode');
	
	
	// Button Shortcode		
		function grassroots_button_shortcode( $atts ) {
		
		    extract(shortcode_atts(array(
		        'label' => 'Button',
		        'url' => '#'
		    ), $atts));
		
		    global $post;
		
		    if (!$for) $for = str_replace(" ","+",$post->post_title);
		
		    return '<p><a class="button" href="'.$url.'">'.$label.'</a></p>';
		
		}
		
		add_shortcode('button', 'grassroots_button_shortcode');
	
	
	
	// Lead Shortcode		
		function grassroots_lead_shortcode( $atts, $content = null ) {
		   return '<div class="lead">' . $content . '</div>';
		}
		add_shortcode('lead', 'grassroots_lead_shortcode');



	// Responsive Video Shortcode		
		function grassroots_responsive_video_shortcode( $atts, $content = null ) {
		   return '<div class="fit-video">' . $content . '</div>';
		}
		add_shortcode('fit', 'grassroots_responsive_video_shortcode');
	
	
	// Page Header Shortcode
		function grassroots_page_header_shortcode( $atts, $content = null ) {
		   return '<div class="page-header">' . $content . '</div>';
		}
		add_shortcode('page-header', 'grassroots_page_header_shortcode');
		