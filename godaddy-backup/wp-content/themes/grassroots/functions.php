<?php 
add_filter('widget_text', 'do_shortcode');
/**
 * The loads all theme functions
 *
 * If you use the theme updater, please
 * place any customizations in a child theme
 * or plugin to prevent being lost when
 * the theme is updated
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 *
 *
 */

// Define Version
	define( 'GRASSROOTS_VERSION', wp_get_theme()->get( 'Version' ) );

// options framework
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
		require_once dirname( __FILE__ ) . '/inc/options-framework.php';
	}
	
	// loads options file directly as required by theme customizer
		require_once dirname( __FILE__ ) . '/includes/options.php';

// Other Theme Functions

	if ( ! function_exists( 'grassroots_setup' ) ):

		function grassroots_setup() {
				
			// For localization
				load_theme_textdomain( 'grassroots', get_template_directory().'/languages' );
			
			// Add default posts and comments RSS feed links to head
				add_theme_support( 'automatic-feed-links' );
			
			// This theme uses wp_nav_menu() in two locations.
				register_nav_menus( array(
					'primary' => __( 'Header Menu', 'grassroots' ),
					'social' => __( 'Social Icons', 'grassroots' ),
				) );
			
			// Add CSS to Visual Editor
				add_editor_style('style-editor.css');
			
		}
	
	endif; // grassroots_setup
	
	add_action( 'after_setup_theme', 'grassroots_setup' );

	
// Go to theme options after theme activated
	if ( is_admin() and isset($_GET['activated'] ) and $pagenow == "themes.php" ) {
	
		global $pagenow, $wp_rewrite;
		
		$wp_rewrite->flush_rules();
		
		wp_redirect( 'themes.php?page=options-framework' );
		
	}




// Load Other Files
	if ( ! function_exists( 'grassroots_files' ) ):

		function grassroots_files() {
		
		// include required files
			include( get_template_directory()."/includes/fonts.php" );
			include( get_template_directory()."/includes/titles.php" );
			include( get_template_directory()."/includes/images.php" );
			include( get_template_directory()."/includes/queries.php" );
			include( get_template_directory()."/includes/scripts.php" );
			include( get_template_directory()."/includes/body-tag.php" );
			include( get_template_directory()."/includes/custom-js.php" );
			include( get_template_directory()."/includes/shortcodes.php" );
			include( get_template_directory()."/includes/custom-css.php" );
			include( get_template_directory()."/includes/woocommerce.php" );
			include( get_template_directory()."/includes/author-fields.php" );
			include( get_template_directory()."/includes/content-limit.php" );
			include( get_template_directory()."/includes/theme-customizer.php" );
			include( get_template_directory()."/includes/comment-functions.php" );
			include( get_template_directory()."/inc/options-framework-scripts.php" );
			include( get_template_directory()."/includes/custom-meta-boxes/grassroots.php" );
			
		// include tgm
			include( get_template_directory()."/includes/theme-plugins.php" );	
		
		// Custom Post Types	
			include( get_template_directory()."/includes/post-types/staff.php" );
			include( get_template_directory()."/includes/post-types/sponsors.php" );
			include( get_template_directory()."/includes/post-types/admin-style.php" );
		
		
		// include widgets
			include( get_template_directory()."/includes/widgets.php" );
			include( get_template_directory()."/includes/widget-page.php" );
			include( get_template_directory()."/includes/widget-posts.php" );
			include( get_template_directory()."/includes/widget-video.php" );
			include( get_template_directory()."/includes/widget-contact.php" );
			include( get_template_directory()."/includes/widget-home-box.php" );
			include( get_template_directory()."/includes/widget-sponsors.php" );
			include( get_template_directory()."/includes/widget-attention.php" );
			include( get_template_directory()."/includes/widget-featured-page.php" );
			include( get_template_directory()."/includes/widget-facebook-like-box.php" );

		}
	
	endif; // grassroots_files
	
	add_action( 'after_setup_theme', 'grassroots_files' );



// include organized themes gallery
	if ( of_get_option( 'gallery' ) == 'yes' ) {
		include( get_template_directory()."/includes/lightbox.php" );
	}


// Filter Excerpt to remove [...]
	function organizedthemes_excerpt_more( $more ) {
		return '';
	}
	add_filter('excerpt_more', 'organizedthemes_excerpt_more');	

//New scripts
function grassroots_script_footer() { ?>
    <script>
        (function ($) {
            $(document).ready(function(){      

				window.onscroll = function() {myFunction()};

				var header = document.getElementById("header");

				var sticky = header.offsetTop;

				function myFunction() {
					if (window.pageYOffset > sticky) {
					    header.classList.add("sticky");
					} else {
					    header.classList.remove("sticky");
					}
				} 

				//Header height
				setTimeout(function(){
					var header_height = $('#header').height();
					//console.log( header_height );
					$('#wrap').css('margin-top', header_height + 50)
				}, 300);

				//WooCommerce tabs - add/remove active class
				$(function() {

					var selClass = 'active';

					$('.woocommerce div.product .woocommerce-tabs ul.tabs li#tab-title-additional_information a').click( function() {
						$('.woocommerce div.product .woocommerce-tabs ul.tabs li#tab-title-description').removeClass('active');
						$('.woocommerce div.product .woocommerce-tabs ul.tabs li#tab-title-reviews').removeClass('active');
						$('.woocommerce div.product .woocommerce-tabs ul.tabs li#tab-title-additional_information').addClass('active');
						$('.woocommerce div.product .woocommerce-tabs #tab-description.panel').css('display', 'none');
						$('.woocommerce div.product .woocommerce-tabs #tab-reviews.panel').css('display', 'none');
						$('.woocommerce div.product .woocommerce-tabs #tab-additional_information.panel').css('display', 'block');
					});
				});

            });   
        })(jQuery);     
    </script>
<?php } 



add_action('wp_footer', 'grassroots_script_footer');

// Theme Updater
	function organizedthemes_theme_update() {
	
		/* updater args */
		$updater_args = array(
			'repo_uri'    => 'http://support.organizedthemes.com/',
			'repo_slug'   => 'grassroots-theme',
			'dashboard'   => false,
			'username'    => false,
		);
	
		/* add support for updater */
		add_theme_support( 'auto-hosted-theme-updater', $updater_args );
	}
	
	add_action( 'after_setup_theme', 'organizedthemes_theme_update' );
	require_once( trailingslashit( get_template_directory() ) . 'includes/theme-updater.php' );
	new Grassroots_Theme_Updater;

	require_once( trailingslashit( get_template_directory() ) . 'includes/theme-license.php' );

	function grassroots_enqueue_font_awesome() {
		wp_enqueue_style(
			'grassroots-font-awesome', 
			'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', 
			array(), 
			'6.6.0'
		);
	}
	add_action('wp_enqueue_scripts', 'grassroots_enqueue_font_awesome');

// Remove WooCommerce product tabs
add_filter( 'woocommerce_product_tabs', 'kagum_remove_tabs', 98 );
function kagum_remove_tabs( $tabs ) {
    unset( $tabs['description'] );        // Remove Description tab
    unset( $tabs['additional_information'] ); // Remove Additional Info tab
    unset( $tabs['reviews'] );            // Remove Reviews tab
    return $tabs;
}
