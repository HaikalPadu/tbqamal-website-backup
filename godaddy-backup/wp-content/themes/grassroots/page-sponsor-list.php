<?php
/*
 * Template Name: Sponsor List
 *
 *
 * This file displays the complete list of sponsors
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 */ 
 
get_header(); ?>

	<div id="content" class="page-full clearfix" role="main">
	
		<?php while (have_posts()) : the_post(); ?>
			
			<div class="clearfix">
			
				<h1 class="page-title"><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
			
			</div>
			
		<?php endwhile; ?>
		
		<div class="sponsor-list clearfix">
		
			<?php $loop = new WP_Query( array( 'post_type' => 'sponsor', 'posts_per_page' => '-1', 'orderby'=>'menu_order', 'order'=>'ASC' ) ); ?>
			
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		
				<?php get_template_part( 'layouts/sponsor-group-item' ); ?>
				
			<?php endwhile; wp_reset_query(); ?>
		
		</div>
		
	</div><!-- #content -->

<?php get_footer(); ?>