<?php
 /**
  * Title: Primary Sidebar
  * Slug: carbon-charity/primary-sidebar
  * Categories: posts
  */
?>

<!-- wp:group -->
<div class="wp-block-group" style="">
	<!-- wp:heading {"textAlign":"left"} -->
	<h2 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Latest posts', 'carbon-charity' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:latest-posts {"postsToShow":3,"displayAuthor":true,"displayPostDate":true,"displayFeaturedImage":true,"featuredImageAlign":"left"} /-->
	<!-- wp:heading {"textAlign":"left"} -->
	<h2 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Latest Comments', 'carbon-charity' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:latest-comments /-->
</div>
<!-- /wp:group -->
