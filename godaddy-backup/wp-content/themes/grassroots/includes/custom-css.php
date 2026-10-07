<?php
/**
 * The custom css generator.
 *
 * This file takes the custom styling from
 * the theme options page and adds it to the
 * header.php file. 
 *
 * @package 	Grassroots
 * @since		1.0.0
 */


add_action( 'wp_head', 'organizedthemes_custom_css_hook' );

if ( ! function_exists( 'organizedthemes_custom_css_hook' ) ):

	function organizedthemes_custom_css_hook( ) {
	   
	?>
 
<style type='text/css'>
	
	<?php 
		
		if ( !of_get_option( 'disable_fonts' ) ) {
		
			$output = '';
			$input = '';
			
			if ( of_get_option( 'body_font' ) ) {
				$output .= options_typography_font_styles( of_get_option( 'body_font' ) , 'body');
			}
			
			if ( of_get_option( 'site_title_font' ) ) {
				$output .= options_typography_font_styles( of_get_option( 'site_title_font' ) , '#text-logo p, #text-logo h1');
			}
			if ( of_get_option( 'heading_font' ) ) {
				$output .= options_typography_font_styles( of_get_option( 'heading_font' ) , 'h1, h2, h3, h4, h5, h6');
			}
			if ( of_get_option( 'navigation_font' ) ) {
				$output .= options_typography_font_styles( of_get_option( 'navigation_font' ) , 'nav#top-menu li, .slicknav_nav li, .slicknav_menu  .slicknav_menutxt');
			}
			if ( of_get_option( 'hero_title_font' ) ) {
				$output .= options_typography_font_styles( of_get_option( 'hero_title_font' ) , 'h2.hero-title');
			}
			if ( of_get_option( 'hero_text_font' ) ) {
				$output .= options_typography_font_styles( of_get_option( 'hero_text_font' ) , '.hero-copy p');
			}
			if ( of_get_option( 'widget_title_font' ) ) {
				$output .= options_typography_font_styles( of_get_option( 'widget_title_font' ) , 'h3.widget-title, #sidebar .testimony-block h3.widget-title');
			}
					
			if ( $output != '' ) {
				$output =  $output ;
				echo $output;
			}
		
		}
	
	 ?>
	
		body { 
			background: <?php if(of_get_option('background_image', $single = true) != ""){ ?>url(<?php echo of_get_option('background_image', '' ); ?>)<?php } ?> <?php echo of_get_option('background_color', '' ); ?> <?php echo of_get_option('background_repeat', '' ); ?> <?php echo of_get_option('background_attachment', '' ); ?> <?php echo of_get_option('background_position_horizontal', '' ); ?> <?php echo of_get_option('background_position_vertical', '' ); ?>; 
			<?php if(of_get_option('background_size', $single = true) != ""){ ?>
				-moz-background-size: <?php echo of_get_option('background_size', '' ); ?>; 
				-webkit-background-size: <?php echo of_get_option('background_size', '' ); ?>; 
				background-size: <?php echo of_get_option('background_size', '' ); ?>; <?php } ?> 
		}
			
	<?php if(of_get_option('logo_color', $single = true) != ""){ ?>
	
		#text-logo a, #text-logo a:visited { color: <?php echo of_get_option('logo_color' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('logo_color_hover', $single = true) != ""){ ?>
	
		#text-logo a:hover { color: <?php echo of_get_option('logo_color_hover' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('navigation_bar', $single = true) != ""){ ?>
	
		#header.scroll-background,
		body.standard #header,
		body.blog #header,
		body.archive #header,
		body.error404 #header,
		body.single-product #header,
		body.search #header { background-color: <?php echo of_get_option('navigation_bar' ); ?> }
	<?php } ?>
	<?php if(of_get_option('navigation_item', $single = true) != ""){ ?>
	
		nav#top-menu ul li a,
		.scroll nav#top-menu ul li a { color: <?php echo of_get_option('navigation_item' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('navigation_item_hover', $single = true) != ""){ ?>
	
		nav#top-menu ul li.current-menu-item a,
		nav#top-menu ul li.current-menu-item a:hover,
		nav#top-menu ul li a:hover,
		.scroll nav#top-menu ul li.current-menu-item a,
		.scroll nav#top-menu ul li a:hover { color: <?php echo of_get_option('navigation_item_hover' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('navigation_drop_down_background', $single = true) != ""){ ?>
	
		nav#top-menu ul li:hover > ul,
		.slicknav_btn,
		.slicknav_nav { background-color: <?php echo of_get_option('navigation_drop_down_background' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('navigation_drop_down_color', $single = true) != ""){ ?>
		
		nav#top-menu ul li.current-menu-item ul li a,
		nav#top-menu ul li:hover > ul a,
		nav#top-menu ul ul li.current-menu-item a,
		.scroll nav#top-menu ul li:hover > ul a,
		.scroll nav#top-menu ul ul li.current-menu-item a,
		.slicknav_menu  .slicknav_menutxt,
		.slicknav_nav a { color: <?php echo of_get_option('navigation_drop_down_color' ); ?>; }
		.slicknav_menu .slicknav_icon-bar { background-color: <?php echo of_get_option('navigation_drop_down_color' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('navigation_drop_down_color_hover', $single = true) != ""){ ?>
	
		nav#top-menu ul li:hover > ul a:hover,
		nav#top-menu ul li ul li.current-menu-item a:hover,
		nav#top-menu ul li.current-menu-item ul li a:hover,
		nav#top-menu ul li ul li.current-menu-item a,
		.scroll nav#top-menu ul li:hover > ul a:hover,
		.scroll nav#top-menu ul ul li.current-menu-item a:hover,
		.slicknav_nav .slicknav_item a:hover { color: <?php echo of_get_option('navigation_drop_down_color_hover' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('navigation_button_color', $single = true) != ""){ ?>
	
		nav#top-menu ul li.button a,
		.scroll nav#top-menu ul li.button a {
			color: <?php echo of_get_option('navigation_button_color' ); ?>;
			border-color: <?php echo of_get_option('navigation_button_color' ); ?>;
		}
	<?php } ?>
	<?php if(of_get_option('navigation_button_color_hover', $single = true) != ""){ ?>
	
		nav#top-menu ul li.button a:hover,
		.scroll nav#top-menu ul li.button a:hover {
			color: <?php echo of_get_option('navigation_button_color_hover' ); ?>;
			border-color: <?php echo of_get_option('navigation_button_color_hover' ); ?>;
		}
	<?php } ?>
	<?php if(of_get_option('drop_down_distance', $single = true) != ""){ ?>
	
		nav#top-menu ul li:hover ul { margin-top: <?php echo of_get_option('drop_down_distance' ); ?>px; }
	<?php } ?>
	<?php if(of_get_option('content_text', $single = true) != ""){ ?>
	
		#wrap { color: <?php echo of_get_option('content_text' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('content_background', $single = true) != ""){ ?>
	
		#wrap { background-color: <?php echo of_get_option('content_background' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('heading_color', $single = true) != ""){ ?>
	
		h1,h2,h3,h4,h5,h6 { color: <?php echo of_get_option('heading_color' ); ?>; }
	<?php } ?>	
	<?php if(of_get_option('link_color', $single = true) != ""){ ?>
	
		a, a:visited { color: <?php echo of_get_option('link_color' ); ?> }
	<?php } ?>
	<?php if(of_get_option('link_color_hover', $single = true) != ""){ ?>
	
		a:hover { color: <?php echo of_get_option('link_color_hover' ); ?> }
	<?php } ?>

	<?php
	//Footer Layout
	if( of_get_option('footer_layout', $single = true) == "full-footer" ) { ?>

			#footer-content {
				width: 100%;
			}

	<?php } elseif ( of_get_option('footer_layout', $single = true) == "compact-footer" ) { ?>

		#footer-content {
			width: 960px;
		}

		@media only screen and (min-width: 1200px) {
			#footer-content {
				width: 1140px;
			}
		}

		@media only screen and (min-width: 1200px) {
			#footer-content {
				width: 1140px;
			}
		}

		@media only screen and (min-width: 768px) and (max-width: 1023px) {

			#footer-content {
				width: 750px;
			}

		}
			
		@media only screen and (max-width: 767px) {		
			#footer-content {
				width: 90%;
			}
		}

	<?php } else{ ?>

		#footer-content {
			width: 100%;
		}

	<?php } ?>

	<?php if( of_get_option('footer_col_nr', $single = true) == "one" ){ ?>
		#footer-sidebar .widget { 
			width: 100%;
		}
	<?php } elseif ( of_get_option('footer_col_nr', $single = true) == "two" ) { ?>
		#footer-sidebar .widget { 
			width: 50%;
		}
	<?php } elseif ( of_get_option('footer_col_nr', $single = true) == "three" ) { ?>
		#footer-sidebar .widget { 
			width: 33.3333%;
		}
		@media screen and (max-width: 767px) {
			#footer-sidebar .widget { 
				width: 50%;
			}			
		}
	<?php } elseif ( of_get_option('footer_col_nr', $single = true) == "four" ) { ?>
		#footer-sidebar .widget { 
			width: 25%;
		}
	<?php } else { ?>
		#footer-sidebar .widget { 
			width: 25%;
		}		
	<?php } ?>
	
	<?php if(of_get_option('footer_color', $single = true) != ""){ ?>
	
		#footer,
		#footer .widget,
		#footer input#search-submit,
		#footer form.searchform,
		#footer h3.widget-title { color: <?php echo of_get_option('footer_color' ); ?>; border-color: <?php echo of_get_option('footer_color', '' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('footer_background_color', $single = true) != ""){ ?>
	
		#footer-content { background-color: <?php echo of_get_option('footer_background_color' ); ?> }
	<?php } ?>
	<?php if(of_get_option('footer_link_color', $single = true) != ""){ ?>
	
		#footer a,
		#footer a:visited { color: <?php echo of_get_option('footer_link_color' ); ?> }
	<?php } ?>
	<?php if(of_get_option('footer_link_color_hover', $single = true) != ""){ ?>
	
		#footer a:hover { color: <?php echo of_get_option('footer_link_color_hover' ); ?> }
	<?php } ?>
	<?php if(of_get_option('footer_line', $single = true) != ""){ ?>
	
		ul#footer-menu li, ul#footer-menu li { border-color: <?php echo of_get_option('footer_line' ); ?> }
	<?php } ?>
	<?php if(of_get_option('widget_title', $single = true) != ""){ ?>
	
		h3.widget-title { color: <?php echo of_get_option('widget_title' ); ?>; border-color: <?php echo of_get_option('widget_title' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('widget_text', $single = true) != ""){ ?>
	
		.widget,
		#sidebar input#search-submit,
		#sidebar form#searchform,
		#sidebar input#searchsubmit { color: <?php echo of_get_option('widget_text' ); ?>;  }
	<?php } ?>	
	<?php if(of_get_option('button', $single = true) != ""){ ?>
		
		button,
		a.button,
		input.button,
		input[type="button"],
		input[type="submit"],
		#wrap a.tribe-events-button { color: <?php echo of_get_option( 'button' ); ?> }
	<?php } ?>
	<?php if(of_get_option('button_background', $single = true) != ""){ ?>
		
		button,
		a.button,
		input.button,
		input[type="button"],
		input[type="submit"],
		#wrap a.tribe-events-button{ background-color: <?php echo of_get_option('button_background' ); ?> }
	<?php } ?>
	<?php if(of_get_option('button_hover', $single = true) != ""){ ?>
		
		button:hover,
		a:hover.button,
		input:hover.button,
		input:hover[type="button"],
		input:hover[type="submit"]
		#wrap a:hover.tribe-events-button { color: <?php echo of_get_option('button_hover' ); ?> }
	<?php } ?>
	<?php if(of_get_option('button_background_hover', $single = true) != ""){ ?>
		
		button:hover,
		a:hover.button,
		input:hover.button,
		input:hover[type="button"],
		input:hover[type="submit"]
		#wrap a:hover.tribe-events-button { background-color: <?php echo of_get_option('button_background_hover' ); ?> }
	<?php } ?>
	<?php if(of_get_option('alt_button', $single = true) != ""){ ?>
	
		button.alt,
		a.button.alt,
		input.button.alt { color: <?php echo of_get_option('alt_button', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('alt_button_background', $single = true) != ""){ ?>
	
		button.alt,
		a.button.alt,
		input.button.alt { background-color: <?php echo of_get_option('alt_button_background', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('alt_button_hover', $single = true) != ""){ ?>
	
		button.alt:hover,
		a.button.alt:hover,
		input.button.alt:hover { color: <?php echo of_get_option('alt_button_hover', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('alt_button_background_hover', $single = true) != ""){ ?>
	
		button.alt:hover,
		a.button.alt:hover,
		input.button.alt:hover { background-color: <?php echo of_get_option('alt_button_background_hover', '' ); ?> }
	<?php } ?>
	<?php if(of_get_option('price_color', $single = true) != ""){ ?>
	
		p.item-price,
		.woocommerce div.product p.price, 
		.woocommerce div.product span.price,
		.woocommerce ul.products li.product .price {
	    	color: <?php echo of_get_option('price_color', '' ); ?>;
		}
	<?php } ?>
	<?php if(of_get_option('sale_background', $single = true) != ""){ ?>
	
		.woocommerce span.onsale{
	    	background-color: <?php echo of_get_option('sale_background', '' ); ?>;
		}
	<?php } ?>
	<?php if(of_get_option('sale_text', $single = true) != ""){ ?>
	
		.woocommerce span.onsale{
	    	color: <?php echo of_get_option('sale_text', '' ); ?>;
		}
	<?php } ?>	
	<?php if(of_get_option('social_color', $single = true) != ""){ ?>
	
		ul.network-icons li a:before { color: <?php echo of_get_option('social_color' ); ?> }
	<?php } ?>
	<?php if(of_get_option('social_color_background', $single = true) != ""){ ?>
	
		ul.network-icons li a:before { background-color: <?php echo of_get_option('social_color_background' ); ?> }
	<?php } ?>
	<?php if(of_get_option('social_color_hover', $single = true) != ""){ ?>
	
		ul.network-icons li:hover a:before { color: <?php echo of_get_option('social_color_hover' ); ?> }
	<?php } ?>
	<?php if(of_get_option('social_color_background_hover', $single = true) != ""){ ?>
	
		ul.network-icons li:hover a:before { background-color: <?php echo of_get_option('social_color_background_hover' ); ?> }
	<?php } ?>
	<?php if(of_get_option('donate_base_color', $single = true) != ""){ ?>
	
		.organizedthemes-campaign-holder .graph-holder { background-color: <?php echo of_get_option('donate_base_color' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('donate_progress_color', $single = true) != ""){ ?>
	
		.organizedthemes-campaign-holder .graph-progress { background-color: <?php echo of_get_option('donate_progress_color' ); ?>; }
	<?php } ?>
	<?php if(of_get_option('custom_css', $single = true) != ""){ ?>
	
		<?php echo of_get_option('custom_css' ); ?>
	<?php } ?>

</style>
 
<?php
}
	
endif; // organizedthemes_custom_css_hook