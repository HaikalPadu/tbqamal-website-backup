<?php

/**
 * Replaces the default user fields with more useful ones
 *
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 *
 *
 */

	function organizedthemes_author_fields( $contactmethods ) {
		
		// Add new networks
			$contactmethods['instagram_profile'] = 'Instagram Profile URL';
			$contactmethods['google_profile'] = 'Google Profile URL';
			$contactmethods['twitter_profile'] = 'X Profile URL';
			$contactmethods['facebook_profile'] = 'Facebook Profile URL';
			$contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
			$contactmethods['youtube_profile'] = 'YouTube Profile URL';
			$contactmethods['vimeo_profile'] = 'Vimeo Profile URL';
			$contactmethods['pinterest_profile'] = 'Pinterest Profile URL';
			$contactmethods['flickr_profile'] = 'Flickr Profile URL';
			$contactmethods['dribbble_profile'] = 'Dribbble Profile URL';
		
		// Remove old fields
			unset($contactmethods['aim']);
			unset($contactmethods['jabber']);
			unset($contactmethods['yim']);
			
		
		return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'organizedthemes_author_fields', 10, 1);