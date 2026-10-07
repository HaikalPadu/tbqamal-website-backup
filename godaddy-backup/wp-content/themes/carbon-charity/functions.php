<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package carbon-charity
 * @since 1.0.0
 */

/**
 * The theme version.
 *
 * @since 1.0.0
 */
define( 'carbon_charity_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Add theme support for block styles and editor style.
 *
 * @since 1.0.0
 *
 * @return void
 */
function carbon_charity_setup() {
	add_editor_style( './assets/css/style-shared.css' );

	/*
	 * Load additional block styles.
	 * See details on how to add more styles in the readme.txt.
	 */
	$styled_blocks = [ 'button', 'quote', 'navigation', 'search', 'blocks' ];
	foreach ( $styled_blocks as $block_name ) {
		$args = array(
			'handle' => "carbon-charity-$block_name",
			'src'    => get_theme_file_uri( "assets/css/blocks/$block_name.min.css" ),
			'path'   => get_theme_file_path( "assets/css/blocks/$block_name.min.css" ),
		);
		// Replace the "core" prefix if you are styling blocks from plugins.
		wp_enqueue_block_style( "core/$block_name", $args );
	}

}
add_action( 'after_setup_theme', 'carbon_charity_setup' );

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function carbon_charity_styles() {
	wp_enqueue_style(
		'carbon-charity-style',
		get_stylesheet_uri(),
		[],
		carbon_charity_VERSION
	);
	wp_enqueue_style(
		'carbon-charity-shared-styles',
		get_theme_file_uri( 'assets/css/style-shared.css' ),
		[],
		carbon_charity_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'carbon_charity_styles' );

/**
 * Enqueue the admin CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function carbon_charity_admin_styles() {
	wp_enqueue_style(
		'carbon-charity-theme-info-style',
		get_template_directory_uri() . '/assets/css/theme-info.css',
		[],
		carbon_charity_VERSION
	);
}
add_action( 'admin_enqueue_scripts', 'carbon_charity_admin_styles' );

/**
 * Custom Menu Page.
 *
 * @since 1.0.0
 *
 * @return void
 */
function carbon_charity_menu_page() {
    add_submenu_page(
        'themes.php', // Parent slug: 'themes.php' is for Appearance menu
        'Theme Page', // Page title
        'Carbon Charity Info', // Menu title
        'manage_options', // Capability
        'theme-menu-page', // Menu slug
        'carbon_charity_menu_page_callback' // Callback function
    );
}
add_action('admin_menu', 'carbon_charity_menu_page');

function carbon_charity_menu_page_callback() {
	$theme         = wp_get_theme();
    $theme_name    = $theme->get('Name');
    $theme_version = $theme->get( 'Version' );
    $theme_slug    = $theme->get_template();
    ?>
    <div class="theme-wrap">
    	<div class="theme-wrap-inner">
	        <h1><?php echo esc_html__( 'Welcome to the', 'carbon-charity' ) . ' ' . esc_html( $theme_name ) . ' ' . esc_html( $theme_version ); ?></h1>
	        <p><?php echo esc_html( $theme_name ) . ' ' . esc_html__( 'is now installed and ready to use.', 'carbon-charity' ); ?></p>
	        <div class="quick-links">
	        	<?php
	        	echo '<a href="' . esc_url( 'https://www.kantipurthemes.com/' ) . esc_html__( 'carbon-pro', 'carbon-charity' ) . '" target="_blank" class="button button-hero button-primary">' . esc_html__( 'Buy Pro', 'carbon-charity' ).'</a>';
	        	echo '<a href="' . esc_url( 'https://www.kantipurthemes.com/' . esc_html( $theme_slug ) ) . '" target="_blank" class="button button-hero button-secondary">' . esc_html__( 'Theme Info', 'carbon-charity' ).'</a>';
	        	?>
	        </div>
    	</div>
    </div>
    <?php
}

// Filters.
require_once get_theme_file_path( 'inc/filters.php' );

// Block variation example.
require_once get_theme_file_path( 'inc/register-block-variations.php' );

// Block style examples.
require_once get_theme_file_path( 'inc/register-block-styles.php' );

// Block pattern and block category examples.
require_once get_theme_file_path( 'inc/register-block-patterns.php' );
