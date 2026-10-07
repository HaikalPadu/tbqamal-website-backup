<?php
/**
 * Archive
 *
 * This file will display various archive types
 *
* @package WordPress
* @subpackage Grassroots
* @since 1.0.0
*/

get_header(); ?>

	<div id="content" class="site-content" role="main">
		
		<h1 class="page-title">
			<?php
				if ( is_category() ) :
					single_cat_title();

				elseif ( is_tag() ) :
					single_tag_title();

				elseif ( is_author() ) :
					printf( __( 'Author: %s', 'grassroots' ), '<span class="vcard">' . get_the_author() . '</span>' );

				elseif ( is_day() ) :
					printf( __( 'Day: %s', 'grassroots' ), '<span>' . get_the_date() . '</span>' );

				elseif ( is_month() ) :
					printf( __( 'Month: %s', 'grassroots' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'grassroots' ) ) . '</span>' );

				elseif ( is_year() ) :
					printf( __( 'Year: %s', 'grassroots' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'grassroots' ) ) . '</span>' );

				else :
					_e( 'Archives', 'grassroots' );

				endif;
			?>
		</h1>
		<?php
			// Show an optional term description.
			$term_description = term_description();
			if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			endif;
		?>
		
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