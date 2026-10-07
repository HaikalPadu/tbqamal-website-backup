<?php 

/**
 * Loads functions specific to WooCommerce
 *
 * @package		Organized Themes
 * @subpackage	Grassroots
 * @since		1.1.0
 *
 */

// Declare Woocommerce Support
	add_theme_support( 'woocommerce' );

// Remove WooCommerce Styles
	define( 'WOOCOMMERCE_USE_CSS', false );

// Removes WooCommerce CSS	
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// Load Stylesheet
	function grassroots_woo_styles() {
		
		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		
			wp_enqueue_style( 'shop-designs-woo', get_template_directory_uri() . '/styles-woocommerce.css', false, GRASSROOTS_VERSION, 'screen' );
		
		}
		
	}	
	add_action( 'wp_enqueue_scripts', 'grassroots_woo_styles', 59 );