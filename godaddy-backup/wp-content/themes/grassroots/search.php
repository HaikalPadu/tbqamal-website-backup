<?php
/**
 * Search
 *
 * This file shows display search results
 *
* @package WordPress
* @subpackage Grassroots
* @since 1.0.0
*/

get_header(); ?>

	<div id="content" class="site-content" role="main">
		
		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'grassroots' ), '<span class="search-term">' . get_search_query() . '</span>' ); ?></h1>
		
		<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
				
				<header class="entry-header">
					
					<h2 class="page-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'grassroots' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h2>
					
					<?php get_template_part( 'layouts/post-meta' ); ?>
				
				</header><!-- .entry-header -->
				
					<?php the_excerpt(); ?>
				
			</article><!-- #post-<?php the_ID(); ?> -->
		
		<?php endwhile ; else : ?>
		
			<?php get_template_part( 'layouts/not-found' ); ?>
			
		<?php endif ; ?>
	
		<?php get_template_part( 'layouts/pagination' ); ?>	

	</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>