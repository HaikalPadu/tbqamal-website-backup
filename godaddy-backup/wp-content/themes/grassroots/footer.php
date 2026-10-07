<?php
/**
 * Dislpays the footer
 *
 *
* @package WordPress
* @subpackage Grassroots
* @since 1.0.0
*/?>

	<?php if ( ! is_page_template( 'page-home-template.php' ) ) : ?>
			
		</div><!-- #wrap -->
	
	<?php endif ?>
	
	<div id="footer">
		
		<div id="footer-content" class="clearfix">
			
			<?php if ( is_active_sidebar( 'footer_sidebar' ) ) : ?>
			
				<div id="footer-sidebar" class="clearfix">
				
					<?php dynamic_sidebar( 'footer_sidebar' ); ?>
				
				</div><!-- #footer-sidebar -->
			
			<?php endif ; // is_active_sidebar ?>
			
			<div id="footer-left">
				
				<?php if ( of_get_option('footer_text', $single = true) != "") : ?>
				
					<p><?php echo of_get_option('footer_text'); ?></p>
					
				<?php else : ?>
				
					<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p> 
				
				<?php endif ; ?> 
			
			</div><!-- #footer-left -->
		
			<div id="footer-right">
	
				<?php if ( of_get_option('footer_text_right', $single = true) != "" ) : ?>
				
					<p><?php echo of_get_option('footer_text_right'); ?></p>
					
				<?php elseif ( has_nav_menu( 'social' ) ) : 
					
						wp_nav_menu(
							array(
								'theme_location'  => 'social',
								'container'       => 'nav',
								'container_id'    => 'menu-social-media',
								'container_class' => 'menu',
								'menu_id'         => 'menu-social-media-items',
								'menu_class'      => 'menu-items',
								'link_before'     => '<span class="screen-reader-text">',
								'link_after'      => '</span>',
								'depth'           => 1,
								'fallback_cb'     => '',
							)
						);
						
					?>
				
				<?php else : ?>
				
					<p id="organizedthemes-link"><a href="http://www.organizedthemes.com" target="_blank" title="Powered by the Grassroots theme from Organized Themes" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/images/favicon.png" alt="Organized Themes" /></a></p>
				
				<?php endif ; ?>
						
			</div><!-- #footer-right -->
			
		</div><!-- #footer-content -->
		
	</div><!-- #footer -->

<!-- Load wp_footer -->
<?php wp_footer(); ?>


</body>
</html>

<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->