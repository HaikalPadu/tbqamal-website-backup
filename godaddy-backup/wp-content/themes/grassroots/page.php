<?php
/**
 * PaGE
 *
 * This file generates a basic page.
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
				
				</header><!-- .entry-header -->
				
				<?php the_content(__('<span class="more-link">Read more</span>', 'grassroots')); ?>
				
				<?php wp_link_pages('before=<nav id="page-links">&after=</nav'); ?>
			
			</article>
			
		<?php endwhile; ?>

	</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>