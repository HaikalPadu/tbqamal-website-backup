<?php
/*
 Template Name: Home Page
 *
 *
 * Creates a page made up entirely from widgets
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 */ 
 
get_header(); ?>
	
	<?php if(is_active_sidebar( 'home_1' )) { ?>
	
		<div id="home-one" class="home-widgets">
			
			<div class="widget-wrap">
		
				<?php dynamic_sidebar( 'home_1' ); ?>
				
					<style>

						<?php if ( of_get_option('home_1_text', $single = true) != "" ) { ?>
							#home-one,
							#home-one h3.widget-title { color: <?php echo of_get_option('home_1_text', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_1_link', $single = true) != "" ) { ?>
							#home-one a,
							#home-one a:visited { color: <?php echo of_get_option('home_1_link', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_1_hover', $single = true) != "" ) { ?>
							#home-one a:hover { color: <?php echo of_get_option('home_1_hover', '' ); ?> }
						<?php } ?>
						
						#home-one { background: <?php if(of_get_option('home_1_image', $single = true) != ""){ ?>url(<?php echo of_get_option('home_1_image' ); ?>)<?php } ?> <?php echo of_get_option('home_1'); ?> <?php echo of_get_option('home_1_repeat'); ?> <?php echo of_get_option('home_1_attachment'); ?> <?php echo of_get_option('home_1_position_horizontal'); ?> <?php echo of_get_option('home_1_position_vertical'); ?>; 
							<?php if(of_get_option('home_1_size', $single = true) != ""){ ?>
								-moz-background-size: <?php echo of_get_option('home_1_size', '' ); ?>; 
								-webkit-background-size: <?php echo of_get_option('home_1_size', '' ); ?>; 
								background-size: <?php echo of_get_option('home_1_size', '' ); ?>; <?php } ?> }
						
					</style>
	
			</div><!-- .widget-widget-wrap -->
				
		</div><!-- #home-one -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_2' )) { ?>
	
		<div id="home-two" class="home-widgets">
			
			<div class="widget-wrap">
		
				<?php dynamic_sidebar( 'home_2' ); ?>
				
					<style>

						<?php if ( of_get_option('home_2_text', $single = true) != "" ) { ?>
							#home-two,
							#home-two h3.widget-title { color: <?php echo of_get_option('home_2_text', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_2_link', $single = true) != "" ) { ?>
							#home-two a,
							#home-two a:visited { color: <?php echo of_get_option('home_2_link', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_2_hover', $single = true) != "" ) { ?>
							#home-two a:hover { color: <?php echo of_get_option('home_2_hover', '' ); ?> }
						<?php } ?>
						
						#home-two { background: <?php if(of_get_option('home_2_image', $single = true) != ""){ ?>url(<?php echo of_get_option('home_2_image' ); ?>)<?php } ?> <?php echo of_get_option('home_2'); ?> <?php echo of_get_option('home_2_repeat'); ?> <?php echo of_get_option('home_2_attachment'); ?> <?php echo of_get_option('home_2_position_horizontal'); ?> <?php echo of_get_option('home_2_position_vertical'); ?>; 
							<?php if(of_get_option('home_2_size', $single = true) != ""){ ?>
								-moz-background-size: <?php echo of_get_option('home_2_size', '' ); ?>; 
								-webkit-background-size: <?php echo of_get_option('home_2_size', '' ); ?>; 
								background-size: <?php echo of_get_option('home_2_size', '' ); ?>; <?php } ?> }
						
					</style>
	
			</div><!-- .widget-widget-wrap -->
				
		</div><!-- #home-two -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_3' )) { ?>
	
		<div id="home-three" class="home-widgets">
			
			<div class="widget-wrap">
		
				<?php dynamic_sidebar( 'home_3' ); ?>
				
					<style>

						<?php if ( of_get_option('home_3_text', $single = true) != "" ) { ?>
							#home-three,
							#home-three h3.widget-title { color: <?php echo of_get_option('home_3_text', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_3_link', $single = true) != "" ) { ?>
							#home-three a,
							#home-three a:visited { color: <?php echo of_get_option('home_3_link', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_3_hover', $single = true) != "" ) { ?>
							#home-three a:hover { color: <?php echo of_get_option('home_3_hover', '' ); ?> }
						<?php } ?>
						
						#home-three { background: <?php if(of_get_option('home_3_image', $single = true) != ""){ ?>url(<?php echo of_get_option('home_3_image' ); ?>)<?php } ?> <?php echo of_get_option('home_3'); ?> <?php echo of_get_option('home_3_repeat'); ?> <?php echo of_get_option('home_3_attachment'); ?> <?php echo of_get_option('home_3_position_horizontal'); ?> <?php echo of_get_option('home_3_position_vertical'); ?>; 
							<?php if(of_get_option('home_3_size', $single = true) != ""){ ?>
								-moz-background-size: <?php echo of_get_option('home_3_size', '' ); ?>; 
								-webkit-background-size: <?php echo of_get_option('home_3_size', '' ); ?>; 
								background-size: <?php echo of_get_option('home_3_size', '' ); ?>; <?php } ?> }
						
					</style>
		
			</div><!-- .widget-wrap -->
				
		</div><!-- #home-three -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_4' )) { ?>
	
		<div id="home-four" class="home-widgets">
			
			<div class="widget-wrap">
		
				<?php dynamic_sidebar( 'home_4' ); ?>
				
					<style>

						<?php if ( of_get_option('home_4_text', $single = true) != "" ) { ?>
							#home-four,
							#home-four h3.widget-title { color: <?php echo of_get_option('home_4_text', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_4_link', $single = true) != "" ) { ?>
							#home-four a,
							#home-four a:visited { color: <?php echo of_get_option('home_4_link', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_4_hover', $single = true) != "" ) { ?>
							#home-four a:hover { color: <?php echo of_get_option('home_4_hover', '' ); ?> }
						<?php } ?>
						
						#home-four { background: <?php if(of_get_option('home_4_image', $single = true) != ""){ ?>url(<?php echo of_get_option('home_4_image' ); ?>)<?php } ?> <?php echo of_get_option('home_4'); ?> <?php echo of_get_option('home_4_repeat'); ?> <?php echo of_get_option('home_4_attachment'); ?> <?php echo of_get_option('home_4_position_horizontal'); ?> <?php echo of_get_option('home_4_position_vertical'); ?>; 
							<?php if(of_get_option('home_4_size', $single = true) != ""){ ?>
								-moz-background-size: <?php echo of_get_option('home_4_size', '' ); ?>; 
								-webkit-background-size: <?php echo of_get_option('home_4_size', '' ); ?>; 
								background-size: <?php echo of_get_option('home_4_size', '' ); ?>; <?php } ?> }
						
					</style>
				
			</div><!-- .widget-wrap -->
				
		</div><!-- #home-four -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_5' )) { ?>
	
		<div id="home-five" class="home-widgets">
			
			<div class="widget-wrap">
		
				<?php dynamic_sidebar( 'home_5' ); ?>
				
					<style>
				
						<?php if ( of_get_option('home_5_text', $single = true) != "" ) { ?>
							#home-five,
							#home-five h3.widget-title { color: <?php echo of_get_option('home_5_text', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_5_link', $single = true) != "" ) { ?>
							#home-five a,
							#home-five a:visited { color: <?php echo of_get_option('home_5_link', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_5_hover', $single = true) != "" ) { ?>
							#home-five a:hover { color: <?php echo of_get_option('home_5_hover', '' ); ?> }
						<?php } ?>
						
						#home-five { background: <?php if(of_get_option('home_5_image', $single = true) != ""){ ?>url(<?php echo of_get_option('home_5_image' ); ?>)<?php } ?> <?php echo of_get_option('home_5'); ?> <?php echo of_get_option('home_5_repeat'); ?> <?php echo of_get_option('home_5_attachment'); ?> <?php echo of_get_option('home_5_position_horizontal'); ?> <?php echo of_get_option('home_5_position_vertical'); ?>; 
							<?php if(of_get_option('home_5_size', $single = true) != ""){ ?>
								-moz-background-size: <?php echo of_get_option('home_5_size', '' ); ?>; 
								-webkit-background-size: <?php echo of_get_option('home_5_size', '' ); ?>; 
								background-size: <?php echo of_get_option('home_5_size', '' ); ?>; <?php } ?> }
						
					</style>
			
			</div><!-- .widget-wrap -->
				
		</div><!-- #home-five -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_6' )) { ?>
	
		<div id="home-six" class="home-widgets">
			
			<div class="widget-wrap">
		
				<?php dynamic_sidebar( 'home_6' ); ?>
				
					<style>
				
						<?php if ( of_get_option('home_6_text', $single = true) != "" ) { ?>
							#home-six,
							#home-six h3.widget-title { color: <?php echo of_get_option('home_6_text', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_6_link', $single = true) != "" ) { ?>
							#home-six a,
							#home-six a:visited { color: <?php echo of_get_option('home_6_link', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_6_hover', $single = true) != "" ) { ?>
							#home-six a:hover { color: <?php echo of_get_option('home_6_hover', '' ); ?> }
						<?php } ?>
						
						#home-six { background: <?php if(of_get_option('home_6_image', $single = true) != ""){ ?>url(<?php echo of_get_option('home_6_image' ); ?>)<?php } ?> <?php echo of_get_option('home_6'); ?> <?php echo of_get_option('home_6_repeat'); ?> <?php echo of_get_option('home_6_attachment'); ?> <?php echo of_get_option('home_6_position_horizontal'); ?> <?php echo of_get_option('home_6_position_vertical'); ?>; 
							<?php if(of_get_option('home_6_size', $single = true) != ""){ ?>
								-moz-background-size: <?php echo of_get_option('home_6_size', '' ); ?>; 
								-webkit-background-size: <?php echo of_get_option('home_6_size', '' ); ?>; 
								background-size: <?php echo of_get_option('home_6_size', '' ); ?>; <?php } ?> }
						
					</style>
			
			</div><!-- .widget-wrap -->
			
		</div><!-- #home-six -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_7' )) { ?>
	
		<div id="home-seven" class="home-widgets">
			
			<div class="widget-wrap">
		
				<?php dynamic_sidebar( 'home_7' ); ?>
				
					<style>
				
						<?php if ( of_get_option('home_7_text', $single = true) != "" ) { ?>
							#home-seven,
							#home-seven h3.widget-title { color: <?php echo of_get_option('home_7_text', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_7_link', $single = true) != "" ) { ?>
							#home-seven a,
							#home-seven a:visited { color: <?php echo of_get_option('home_7_link', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_7_hover', $single = true) != "" ) { ?>
							#home-seven a:hover { color: <?php echo of_get_option('home_7_hover', '' ); ?> }
						<?php } ?>
						
						#home-seven { background: <?php if(of_get_option('home_7_image', $single = true) != ""){ ?>url(<?php echo of_get_option('home_7_image' ); ?>)<?php } ?> <?php echo of_get_option('home_7'); ?> <?php echo of_get_option('home_7_repeat'); ?> <?php echo of_get_option('home_7_attachment'); ?> <?php echo of_get_option('home_7_position_horizontal'); ?> <?php echo of_get_option('home_7_position_vertical'); ?>; 
							<?php if(of_get_option('home_7_size', $single = true) != ""){ ?>
								-moz-background-size: <?php echo of_get_option('home_7_size', '' ); ?>; 
								-webkit-background-size: <?php echo of_get_option('home_7_size', '' ); ?>; 
								background-size: <?php echo of_get_option('home_7_size', '' ); ?>; <?php } ?> }
						
					</style>
				
			</div><!-- .widget-wrap -->
			
		</div><!-- #home-seven -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_8' )) { ?>
	
		<div id="home-eight" class="home-widgets">
			
			<div class="widget-wrap">
		
				<?php dynamic_sidebar( 'home_8' ); ?>
				
					<style>
				
						<?php if ( of_get_option('home_8_text', $single = true) != "" ) { ?>
							#home-eight,
							#home-eight h3.widget-title { color: <?php echo of_get_option('home_8_text', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_8_link', $single = true) != "" ) { ?>
							#home-eight a,
							#home-eight a:visited { color: <?php echo of_get_option('home_8_link', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_8_hover', $single = true) != "" ) { ?>
							#home-eight a:hover { color: <?php echo of_get_option('home_8_hover', '' ); ?> }
						<?php } ?>
						
						#home-eight { background: <?php if(of_get_option('home_8_image', $single = true) != ""){ ?>url(<?php echo of_get_option('home_8_image' ); ?>)<?php } ?> <?php echo of_get_option('home_8'); ?> <?php echo of_get_option('home_8_repeat'); ?> <?php echo of_get_option('home_8_attachment'); ?> <?php echo of_get_option('home_8_position_horizontal'); ?> <?php echo of_get_option('home_8_position_vertical'); ?>; 
							<?php if(of_get_option('home_8_size', $single = true) != ""){ ?>
								-moz-background-size: <?php echo of_get_option('home_8_size', '' ); ?>; 
								-webkit-background-size: <?php echo of_get_option('home_8_size', '' ); ?>; 
								background-size: <?php echo of_get_option('home_8_size', '' ); ?>; <?php } ?> }
						
					</style>
				
			</div><!-- .widget-wrap -->
			
		</div><!-- #home-eight -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_9' )) { ?>
	
		<div id="home-nine" class="home-widgets">
			
			<div class="widget-wrap">
		
				<?php dynamic_sidebar( 'home_9' ); ?>
				
					<style>
				
						<?php if ( of_get_option('home_9_text', $single = true) != "" ) { ?>
							#home-nine,
							#home-nine h3.widget-title { color: <?php echo of_get_option('home_9_text', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_9_link', $single = true) != "" ) { ?>
							#home-nine a,
							#home-nine a:visited { color: <?php echo of_get_option('home_9_link', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_9_hover', $single = true) != "" ) { ?>
							#home-nine a:hover { color: <?php echo of_get_option('home_9_hover', '' ); ?> }
						<?php } ?>
						
						#home-nine { background: <?php if(of_get_option('home_9_image', $single = true) != ""){ ?>url(<?php echo of_get_option('home_9_image' ); ?>)<?php } ?> <?php echo of_get_option('home_9'); ?> <?php echo of_get_option('home_9_repeat'); ?> <?php echo of_get_option('home_9_attachment'); ?> <?php echo of_get_option('home_9_position_horizontal'); ?> <?php echo of_get_option('home_9_position_vertical'); ?>; 
							<?php if(of_get_option('home_9_size', $single = true) != ""){ ?>
								-moz-background-size: <?php echo of_get_option('home_9_size', '' ); ?>; 
								-webkit-background-size: <?php echo of_get_option('home_9_size', '' ); ?>; 
								background-size: <?php echo of_get_option('home_9_size', '' ); ?>; <?php } ?> }
						
					</style>
				
			</div><!-- .widget-wrap -->
			
		</div><!-- #home-nine -->
	
	<?php } ?>
	
	<?php if(is_active_sidebar( 'home_10' )) { ?>
	
		<div id="home-ten" class="home-widgets">
			
			<div class="widget-wrap">
		
				<?php dynamic_sidebar( 'home_10' ); ?>
				
					<style>
				
						<?php if ( of_get_option('home_10_text', $single = true) != "" ) { ?>
							#home-ten,
							#home-ten h3.widget-title { color: <?php echo of_get_option('home_10_text', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_10_link', $single = true) != "" ) { ?>
							#home-ten a,
							#home-ten a:visited { color: <?php echo of_get_option('home_10_link', '' ); ?> }
						<?php } ?>
						<?php if ( of_get_option('home_10_hover', $single = true) != "" ) { ?>
							#home-ten a:hover { color: <?php echo of_get_option('home_10_hover', '' ); ?> }
						<?php } ?>
						
						#home-ten { background: <?php if(of_get_option('home_10_image', $single = true) != ""){ ?>url(<?php echo of_get_option('home_10_image' ); ?>)<?php } ?> <?php echo of_get_option('home_10'); ?> <?php echo of_get_option('home_10_repeat'); ?> <?php echo of_get_option('home_10_attachment'); ?> <?php echo of_get_option('home_10_position_horizontal'); ?> <?php echo of_get_option('home_10_position_vertical'); ?>; 
							<?php if(of_get_option('home_10_size', $single = true) != ""){ ?>
								-moz-background-size: <?php echo of_get_option('home_10_size', '' ); ?>; 
								-webkit-background-size: <?php echo of_get_option('home_10_size', '' ); ?>; 
								background-size: <?php echo of_get_option('home_10_size', '' ); ?>; <?php } ?> }
						
					</style>
				
			</div><!-- .widget-wrap -->
			
		</div><!-- #home-ten -->
	
	<?php } ?>

<?php get_footer(); ?>