<?php
/**
 * Displays details about our posts
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 *
 *
 */?>
 
 <p class="post-meta clearfix">
 	<span class="post-date">
 		<?php the_time('F j, Y'); ?>
 	</span>
 	<span class="author">
 		<?php the_author_posts_link(); ?>
 	</span>
 	<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
 		<span class="comment-link">
 			<a href="<?php the_permalink(); ?>#comments"><?php comments_number(__('Comment', 'grassroots'), __('1 Comment', 'grassroots'), __('% Comments', 'grassroots')); ?></a>
 		</span>
 	<?php endif; // comments_open() ?>

 </p>