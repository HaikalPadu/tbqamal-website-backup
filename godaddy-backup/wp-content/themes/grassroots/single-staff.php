<?php
/*
 * Single Staff
 *
 *
 * This file displays an individual staff member
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 */ 

 get_header(); ?>
	
	<?php while (have_posts()) : the_post(); ?>
	
		<div id="staff-sidebar">
			
			<?php the_post_thumbnail( 'staff-thumbnail' ); ?>
			
		</div><!-- #staff-sidebar -->
		
		<div id="staff-content" class="clearfix" role="main">
			
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
				
				<h1 class="page-title"><?php the_title(); ?></h1>
				
				 <?php if ( get_post_meta($post->ID, "title", $single = true ) != "" ) { ?>
				 
					<p class="job-title"><?php echo get_post_meta($post->ID, "title", TRUE); ?></p>
				
				<?php } ?>
						
				<?php the_content(__('<span class="more-link">Read more</span>', 'grassroots')); ?>
				
				<?php wp_link_pages('before=<nav id="page-links">&after=</nav'); ?>
				
				<?php get_template_part( 'layouts/staff-details' ); ?>
				
			</article>	
	
		</div><!-- #content -->

	<?php endwhile ; ?>

<?php get_footer(); ?>