<?php
/**
 * Sponsor Group
 *
 * This file controls the display of all
 * staff members from one sponsor group
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 */ 
 
 get_header(); ?>

	<div id="content" class="page-full clearfix" role="main">
	
		<?php
			$taxonomy = 'sponsor-group';
			$queried_term = get_query_var($taxonomy);
			$terms = get_terms($taxonomy, 'slug='.$queried_term);
			if ($terms) {
			  foreach($terms as $term) {
			    echo '<h1 class="page-title">' . $term->name . '</h1> ';
			  }
			}
		?>
		
		<?php echo category_description(); ?>
		
		<div class="sponsor-list clearfix">
		
			<?php while (have_posts()) : the_post(); ?>
		
				<?php get_template_part( 'layouts/sponsor-group-item' ); ?>
				
			<?php endwhile; ?>
		
		</div>
		
		<?php get_template_part( 'layouts/pagination' ); ?>
		
	</div><!-- #content -->

<?php get_footer(); ?>
