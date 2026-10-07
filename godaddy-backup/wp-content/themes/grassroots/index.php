<?php
/**
 * Main Index File
 *
 * This file shows blog posts in the blog and other archives
 *
* @package WordPress
* @subpackage Grassroots
* @since 1.0.0
*/

get_header(); ?>

	<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
				
				<header class="entry-header">
					
					<?php $first_video = organizedthemes_get_first_video(); ?>
					
					<?php if ( has_post_thumbnail() ) { ?>
						
						<div class="featured-image">
						
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'grassroots' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( '', array( 'class' => 'feature' ) ); ?></a>
						
						</div>
						
					<?php } else if ( $first_video != '' ) { ?>
						
						<div class="fit-video">
						
							<?php echo $first_video; ?>
						
						</div>
						
					<?php } // has_post_thumbnail ?>
					
					<h2 class="page-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'grassroots' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h2>
					
					<?php get_template_part( 'layouts/post-meta' ); ?>
				
				</header><!-- .entry-header -->
						
				<?php if ( of_get_option('content_excerpt') == 'excerpt' ) : ?>
				
					<?php the_excerpt(); ?>
					
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'grassroots' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><span class="more-link"><?php _e('Read More', 'grassroots'); ?></span></a>
					
				<?php else : ?>
				
					<?php if ( ! has_excerpt() ) : ?>
					
						<?php the_content(__('<span class="more-link">Read more</span>', 'grassroots')); ?>
					      
					 <?php else : ?>
					 
					    <?php the_excerpt(); ?>
					      
					    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'grassroots' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><span class="more-link"><?php _e('Read More', 'grassroots'); ?></span></a>
					
					<?php endif ;  // ! has_excerpt ?>
				
				<?php endif ; // if of_get_option = excerpt ?>
				
			</article><!-- #post-<?php the_ID(); ?> -->
		
		<?php endwhile ; else : ?>
		
			<?php get_template_part( 'layouts/not-found' ); ?>
			
		<?php endif ; ?>
	
		<?php get_template_part( 'layouts/pagination' ); ?>	

	</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>