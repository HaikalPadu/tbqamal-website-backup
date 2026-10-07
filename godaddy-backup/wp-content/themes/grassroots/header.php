<?php
/**
 * The file for displaying the header.
 *
 * This file also loads wp_head, logo and navigation
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 *
 *
 */?><!DOCTYPE html>
 <!--[if IE 8 ]> <html class="ie8 <?php language_attributes(); ?>"> <![endif]-->
 <!--[if IE 9 ]> <html class="ie9 <?php language_attributes(); ?>"> <![endif]-->
 <!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
 <head>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
	<!--Load WP Head-->
	
	<?php wp_head(); ?>
	
	<!-- End WP Head -->
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body <?php body_class(); ?>>

<div id="header" class="animated">
	
	<div id="header-content" class="clearfix">
		
		<?php if ( of_get_option('header_blog_title') == 'image' ) : ?>
			
			<?php if ( is_home() && ( get_post_meta( get_option( 'page_for_posts' ), "hero_type", $single = true ) != "" ) ) { ?>
			
				<?php $ID = get_option( 'page_for_posts' ); ?>
			
			<?php } else if ( ! empty( $post->ID ) && get_post_meta($post->ID, "hero_type", $single = true ) != "" ) { ?>
			
				<?php $ID = $post->ID; ?>
			
			<?php } ?>
			
			<?php
			$ID = ! empty( $post->ID ) ? $post->ID : 0;
			if ( ! empty( $ID ) && get_post_meta($ID, "alt_logo", $single = true) != "" ) : ?>
			
				<div id="logo" class="alt-logo">
				
					<h1><a href="<?php echo home_url(); ?>/"><img src="<?php echo get_post_meta($ID, "alt_logo", TRUE); ?>" alt="<?php get_bloginfo('name'); ?>" /></a></h1>	
								
				</div>
				
				<div id="logo" class="scrolling-logo">
				
					<h1><a href="<?php echo home_url(); ?>/"><img src="<?php echo of_get_option('logo','') ?>" alt="<?php get_bloginfo('name'); ?>" /></a></h1>	
								
				</div>
				
			<?php else : ?>
			
				<div id="logo" class="default-logo">
				
					<h1><a href="<?php echo home_url(); ?>/"><img src="<?php echo of_get_option('logo','') ?>" alt="<?php get_bloginfo('name'); ?>" /></a></h1>	
								
				</div>
			
			<?php endif ; // if alt_logo ?>
			
		<?php elseif ( of_get_option('header_blog_title') == 'text' ) : ?>
		
			<div id="text-logo">
				
				<h1><a href="<?php echo home_url(); ?>/"><?php echo get_bloginfo('name'); ?></a></h1>
								
			</div>
			
		<?php endif ; // if header_blog_title ?>
		
		<?php wp_nav_menu( array( 
			'theme_location'	=> 'primary',
			'container'			=> 'nav',
			'container_id'		=> 'top-menu',
			'menu_id'			=> 'primary-menu',
			'depth'				=> 4,
			'fallback_cb'		=> false
			) ); ?>
		
	</div><!-- #header-content -->
	
</div><!-- #header -->

<?php if ( is_page() || is_singular( 'product' ) || is_home() ) : ?>

	<?php get_template_part( 'layouts/hero-options' ); ?>

<?php endif ?>

<?php if ( ! is_page_template( 'page-widget-template.php' ) ) : ?>

	<div id="wrap" class="clearfix">

<?php endif ?>