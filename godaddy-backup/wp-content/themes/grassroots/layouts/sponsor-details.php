<?php
/**
 * Sponsor links.
 *
 * This file creates the social network
 * links for our sponsors
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 *
 *
 */?>
 
 <div class="sponsor-contact">
 <?php if ( get_post_meta($post->ID, "website", $single = true ) != "") { ?> 
 	<span class="website"><a href="http://<?php echo get_post_meta($post->ID, "website", TRUE); ?>"><?php echo get_post_meta($post->ID, "website", TRUE); ?></a></span>
 <?php } ?>
 <?php if ( get_post_meta($post->ID, "phone", $single = true ) != "") { ?>
 	<span class="phone-number"><?php echo get_post_meta($post->ID, "phone", TRUE); ?></span>
 <?php } ?>
 </div>
 
<ul class="network-icons">                                                         

	<?php if ( get_post_meta($post->ID, "network_1_link", $single = true) != "" ) { ?>
		<li><a href="<?php echo get_post_meta($post->ID, "network_1_link", TRUE); ?>"></a></li>
	<?php } ?>
	
	<?php if ( get_post_meta($post->ID, "network_2_link", $single = true) != "" ) { ?>
		<li><a href="<?php echo get_post_meta($post->ID, "network_2_link", TRUE); ?>"></a></li>
	<?php } ?>
	
	<?php if ( get_post_meta($post->ID, "network_3_link", $single = true ) != "") { ?>
		<li><a href="<?php echo get_post_meta($post->ID, "network_3_link", TRUE); ?>"></a></li>
	<?php } ?>
	
	<?php if ( get_post_meta($post->ID, "network_4_link", $single = true) != "" ) { ?>
		<li><a href="<?php echo get_post_meta($post->ID, "network_4_link", TRUE); ?>"></a></li>
	<?php } ?>
	
	<?php if ( get_post_meta($post->ID, "network_5_link", $single = true) != "" ) { ?>
		<li><a href="<?php echo get_post_meta($post->ID, "network_5_link", TRUE); ?>"></a></li>
	<?php } ?>
	
	<?php if ( get_post_meta($post->ID, "network_6_link", $single = true) != "" ) { ?>
		<li><a href="<?php echo get_post_meta($post->ID, "network_6_link", TRUE); ?>"></a></li>
	<?php } ?>
	
	<?php if ( get_post_meta($post->ID, "network_7_link", $single = true) != "" ) { ?>
		<li><a href="<?php echo get_post_meta($post->ID, "network_7_link", TRUE); ?>"></a></li>
	<?php } ?>
			
</ul><!-- .network-icons -->