<?php
/**
 * Staff links.
 *
 * This file creates the social network
 * links for our staff members
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 *
 *
 */?>
 
 <div class="staff-contact">
 <?php if ( get_post_meta($post->ID, "email", $single = true ) != "") { ?>
 	<span class="email-address"><a href="mailto:<?php echo get_post_meta($post->ID, "email", TRUE); ?>"><?php echo get_post_meta($post->ID, "email", TRUE); ?></a></span>
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