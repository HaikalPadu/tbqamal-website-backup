<?php
/**
 * Hero Section
 *
 * Creates our hero media elements
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 */

?>

<?php global $post; ?>

<?php $ID = 0; ?>

<?php if ( is_home() && ( get_post_meta( get_option( 'page_for_posts' ), "hero_type", $single = true ) != "" ) ) { ?>

	<?php $ID = get_option( 'page_for_posts' ); ?>

<?php } else if ( get_post_meta($post->ID, "hero_type", $single = true ) != "" ) { ?>

	<?php $ID = $post->ID; ?>

<?php } ?>

<?php if ( get_post_meta( $ID, "hero_type", $single = true ) != "" ) { ?>
	
	<div id="hero-section" class="<?php echo get_post_meta( $ID, "hero_height", TRUE); ?>">
		
		<style>
			
			<?php if ( get_post_meta( $ID, "hero_type", $single = true ) == "image" ) { ?>
			
				#hero-section { background-image: url(<?php echo get_post_meta( $ID, "hero_image", TRUE); ?>) }
			
			<?php } ?>
			
			@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
				
				.wallpaper-container { display: none; }
				#hero-section {
					<?php if ( get_post_meta( $ID, "hero_image_mobile", $single = true) != "" ) { ?>
						background-image: url(<?php echo get_post_meta( $ID, "hero_image_mobile", TRUE); ?>);
					<?php } else { ?>
						background-image: url(<?php echo get_post_meta( $ID, "hero_image", TRUE); ?>);
					<?php } ?> 
				}
				
			}
			
			@media only screen and (max-width : 768px) {
				
				.wallpaper-container { display: none; }
				#hero-section {
					<?php if ( get_post_meta( $ID, "hero_image_mobile", $single = true ) != "" ) { ?>
						background-image: url(<?php echo get_post_meta( $ID, "hero_image_mobile", TRUE); ?>);
					<?php } else { ?>
						background-image: url(<?php echo get_post_meta( $ID, "hero_image", TRUE); ?>);
					<?php } ?> 
				}
				
			}
			
			<?php if ( get_post_meta( $ID, "hero_title_color", $single = true ) != "" ) { ?>
			
				.hero-copy h2.hero-title { color: <?php echo get_post_meta( $ID, "hero_title_color", TRUE); ?> }
			<?php } ?>
			
			<?php if ( get_post_meta( $ID, "hero_caption_color", $single = true) != "" ) { ?>
			
				.hero-copy p { color: <?php echo get_post_meta( $ID, "hero_caption_color", TRUE); ?> }
			<?php } ?>
			
			<?php if ( get_post_meta( $ID, "hero_button_text_color", $single = true) != "" ) { ?>										
				.hero-copy a.button.hero { color: <?php echo get_post_meta( $ID, "hero_button_text_color", TRUE); ?> }
			<?php } ?>
			
			<?php if ( get_post_meta( $ID, "hero_button_text_hover", $single = true) != "" ) { ?>										
				.hero-copy a.button.hero:hover { color: <?php echo get_post_meta( $ID, "hero_button_text_hover", TRUE); ?> }
			<?php } ?>
			
			<?php if ( get_post_meta( $ID, "hero_logo_color", $single = true) != "" ) { ?>
			
				#header #text-logo a { color: <?php echo get_post_meta( $ID, "hero_logo_color", TRUE); ?> }
			<?php } ?>
			
			<?php if ( get_post_meta( $ID, "hero_logo_color_hover", $single = true) != "" ) { ?>
			
				#header #text-logo a:hover { color: <?php echo get_post_meta( $ID, "hero_logo_color_hover", TRUE); ?> }
			<?php } ?>
			<?php if ( get_post_meta( $ID, "hero_navigation_color", $single = true ) != "" ) { ?>
												
				nav#top-menu ul li a { 
					color: <?php echo get_post_meta( $ID, "hero_navigation_color", TRUE); ?>;
				}
				
			<?php } ?>
			<?php if ( get_post_meta( $ID, "hero_navigation_color_hover", $single = true ) != "" ) { ?>
													
				nav#top-menu ul li.current-menu-item a,
				nav#top-menu ul li a:hover  { 
					color: <?php echo get_post_meta( $ID, "hero_navigation_color_hover", TRUE); ?>;
				}
				
			<?php } ?>
			<?php if ( get_post_meta( $ID, "hero_navigation_button", $single = true ) != "" ) { ?>										
				
				#header nav#top-menu ul li.button a  { 
					color: <?php echo get_post_meta( $ID, "hero_navigation_button", TRUE); ?>;
					border-color: <?php echo get_post_meta( $ID, "hero_navigation_button", TRUE); ?>;
				}
			<?php } ?>
			<?php if ( get_post_meta( $ID, "hero_navigation_button_hover", $single = true ) != "" ) { ?>										
	
				#header nav#top-menu li.button a:hover  { 
					color: <?php echo get_post_meta( $ID, "hero_navigation_button_hover", TRUE); ?>;
					border-color: <?php echo get_post_meta( $ID, "hero_navigation_button_hover", TRUE); ?>;
				}			
			<?php } ?>
			<?php if ( get_post_meta( $ID, "hero_navigation_drop_background", $single = true ) != "" ) { ?>										
				
				nav#top-menu ul li:hover ul  { 
					background-color: <?php echo get_post_meta( $ID, "hero_navigation_drop_background", TRUE); ?>;
				}
			<?php } ?>
			<?php if ( get_post_meta( $ID, "hero_navigation_drop_item", $single = true ) != "" ) { ?>										

				#header nav#top-menu ul ul li a,
				#header nav#top-menu ul ul ul li a,
				#header nav#top-menu ul li.current-menu-item ul li a  { 
					color: <?php echo get_post_meta( $ID, "hero_navigation_drop_item", TRUE); ?>;
				}				
			<?php } ?>
			<?php if ( get_post_meta( $ID, "hero_navigation_drop_item_hover", $single = true ) != "" ) { ?>										
				
				#header nav#top-menu ul ul li a:hover,
				#header nav#top-menu ul li ul li.current-menu-item a,
				#header nav#top-menu ul li.current-menu-item a:hover  { 
					color: <?php echo get_post_meta( $ID, "hero_navigation_drop_item_hover", TRUE); ?>;
				}
			<?php } ?>	
		
		</style>
		
		<div class="hero-copy <?php echo get_post_meta( $ID, "hero_alignment", TRUE); ?>">
			
			<?php if ( get_post_meta( $ID, "hero_logo", $single = true) != "" ) { ?>
				<div class="hero-title-holder">
					<h2 class="hero-logo"><img src="<?php echo get_post_meta( $ID, "hero_logo", TRUE); ?>" alt="<?php echo get_post_meta( $ID, "hero_title", TRUE); ?>" /></h2>
				</div>
			<?php } else if ( get_post_meta( $ID, "hero_title", $single = true) != "" ) { ?>
				<div class="hero-title-holder">
					<h2 class="hero-title"><?php echo get_post_meta( $ID, "hero_title", TRUE); ?></h2>
				</div>
			<?php } ?>
			<?php if ( get_post_meta( $ID, "hero_caption", $single = true ) != ""){ ?>
				<div class="hero-caption">
					<p><?php echo get_post_meta( $ID, "hero_caption", TRUE); ?></p>
				</div>
			<?php } ?>
			<?php if ( get_post_meta( $ID, "hero_button_text", $single = true) != "" ) { ?>
				<div class="hero-button-holder">
					<a class="button hero" href="<?php echo get_post_meta( $ID, "hero_button_url", TRUE); ?>"><?php echo get_post_meta( $ID, "hero_button_text", TRUE); ?></a>
				</div>
			<?php } ?>
			
		</div>
		
		<?php if ( get_post_meta( $ID, "hero_type", $single = true) == "video" ) { ?>
					
			<script>
			
			// Hero section background video
				jQuery("#hero-section").wallpaper({
					 
					mute: <?php if ( get_post_meta( $ID, "mute", $single = true) != "" ) { ?> true,<?php } else {?>false,<?php } ?>
					loop: <?php if ( get_post_meta( $ID, "disable_loop", $single = true) == "on" ) { ?> false<?php } else { ?>true<?php } ?>,
					source: {
							poster: "<?php echo get_post_meta( $ID, "hero_image", TRUE); ?>",
							
							<?php if ( get_post_meta( $ID, "hero_mp4", $single = true ) != "" ){ ?>
							
							mp4:    "<?php echo get_post_meta( $ID, "hero_mp4", TRUE); ?>",
							<?php } if ( get_post_meta( $ID, "hero_ogg", $single = true ) != "" ){ ?>
							
							ogg:    "<?php echo get_post_meta( $ID, "hero_ogg", TRUE); ?>",
							<?php } if ( get_post_meta( $ID, "hero_webm", $single = true ) != "" ){ ?>
							
							webm:   "<?php echo get_post_meta( $ID, "hero_webm", TRUE); ?>",
							<?php } if ( get_post_meta( $ID, "hero_youtube", $single = true ) != "" ){ ?>
							
							video: 	"<?php echo get_post_meta( $ID, "hero_youtube", TRUE); ?>"
							<?php } ?>
							
						}
				});
			
			
			</script>
			
		<?php } ?>
		
	</div><!-- #hero-section -->
	
<?php } ?>