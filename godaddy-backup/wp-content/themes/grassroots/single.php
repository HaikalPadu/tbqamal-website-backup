<?php
/**
 * Single
 *
 * This file dictates how an individual
 * blog post will be shown
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 */

get_header(); ?>

	<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<header class="entry-header">
				
					<h1 class="page-title"><?php the_title(); ?></h1>
					
					<?php get_template_part( 'layouts/post-meta' ); ?>
				
				</header><!-- .entry-header -->
				
				<?php the_content(__('<span class="more-link">Read more</span>', 'grassroots')); ?>
				
				<?php wp_link_pages('before=<nav id="page-links">&after=</nav'); ?>
				
					<footer class="entry-meta">
				
						<?php if ( is_single() && get_the_author_meta( 'description' ) ) : ?>
						
							<?php get_template_part( 'layouts/author-bio' ); ?>
						
						<?php endif; ?>
					
					</footer><!-- .entry-meta -->
				
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>
			
			</article>
			
		<?php endwhile; ?>

	</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>