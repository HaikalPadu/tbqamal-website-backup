<?php
/**
 * This file limits the content to a specified number of characters.  
 * It is from the Genesis framework
 *
 * @package		Grassroots
 * @version		Since 1.0.0
 */

/**
 * Returns content stripped down and limited content.
 *
 * Strips out tags and shortcodes, limits the output to $max_char characters,
 * and appends an ellipses and more link to the end.
 *
 * @since 0.1.0
 *
 * @param integer $max_characters The maximum number of characters to return
 * @param string $more_link_text Optional. Text of the more link. Default is "(more...)"
 * @param bool $stripteaser Optional. Strip teaser content before the more text. Default is false
 * @return string Limited content
 */
function get_the_content_limit( $max_characters, $more_link_text = '(more...)', $stripteaser = false ) {

	$content = get_the_content( '', $stripteaser );

	/** Strip tags and shortcodes so the content truncation count is done correctly */
	$content = strip_tags( strip_shortcodes( $content ), apply_filters( 'get_the_content_limit_allowedtags', '<script>,<style>' ) );

	/** Remove inline styles / scripts */
	$content = trim( preg_replace( '#<(s(cript|tyle)).*?</\1>#si', '', $content ) );

	/** Truncate $content to $max_char */
	$content = organizedthemes_truncate_phrase( $content, $max_characters );

	/** More link? */
	if ( $more_link_text ) {
		$link   = apply_filters( 'get_the_content_more_link', sprintf( '&#x02026; <a href="%s" class="more-link">%s</a>', get_permalink(), $more_link_text ), $more_link_text );
		$output = sprintf( '<p>%s %s</p>', $content, $link );
	} else {
		$output = sprintf( '<p>%s</p>', $content );
		$link = '';
	}

	return apply_filters( 'get_the_content_limit', $output, $content, $link, $max_characters );

}

/**
 * Echoes the limited content.
 *
 * @since 0.1.0
 *
 * @uses get_the_content_limit()
 *
 * @param integer $max_characters The maximum number of characters to return
 * @param string $more_link_text Optional. Text of the more link. Default is "(more...)"
 * @param bool $stripteaser Optional. Strip teaser content before the more text. Default is false
 */
function the_content_limit( $max_characters, $more_link_text = '(more...)', $stripteaser = false ) {

	$content = get_the_content_limit( $max_characters, $more_link_text, $stripteaser );
	echo apply_filters( 'the_content_limit', $content );

}

function organizedthemes_truncate_phrase( $text, $max_characters ) {

	$text = trim( $text );

	if ( strlen( $text ) > $max_characters ) {
		/** Truncate $text to $max_characters + 1 */
		$text = substr( $text, 0, $max_characters + 1 );

		/** Truncate to the last space in the truncated string */
		$text = trim( substr( $text, 0, strrpos( $text, ' ' ) ) );
	}

	return $text;
}
