<?php
/**
 * Title: Hero
 * Slug: carbon-charity/hero
 * Categories: banner
 */

?>

<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-banner.jpg' ) ); ?>","dimRatio":40,"overlayColor":"black","isUserOverlayColor":true,"minHeight":600,"minHeightUnit":"px","contentPosition":"center center","sizeSlug":"large","align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-base-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;min-height:600px"><img class="wp-block-cover__image-background  size-large" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-banner.jpg' ) ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|70","left":"var:preset|spacing|80"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"5%"} -->
<div class="wp-block-column" style="flex-basis:5%"></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"90%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:90%"><!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"lineHeight":"1.3","fontStyle":"normal","fontWeight":"700"}},"textColor":"base","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-link-color has-xx-large-font-size" style="font-style:normal;font-weight:700;line-height:1.3"><?php esc_html_e( 'Give A Helping Hand For Needy People', 'carbon-charity' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-body"}}}},"textColor":"custom-body"} -->
<p class="has-text-align-center has-custom-body-color has-text-color has-link-color"><?php esc_html_e( 'We’ve been tackling poverty in communities to build better lives.', 'carbon-charity' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--60)"><!-- wp:button {"textColor":"base","className":"is-style-carbon-charity-flat-button is-style-fill","style":{"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"color":{"background":"#e5ac1b"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"border":{"radius":"10px"}}} -->
<div class="wp-block-button is-style-carbon-charity-flat-button is-style-fill"><a class="wp-block-button__link has-base-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:10px;background-color:#e5ac1b;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--60)"><?php esc_html_e( 'HOW WE HELP', 'carbon-charity' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"base","className":"is-style-carbon-charity-flat-button","style":{"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"color":{"background":"#d53f34"},"border":{"radius":"10px"}},"fontSize":"extra-small"} -->
<div class="wp-block-button is-style-carbon-charity-flat-button"><a class="wp-block-button__link has-base-color has-text-color has-background has-link-color has-extra-small-font-size has-custom-font-size wp-element-button" href="#" style="border-radius:10px;background-color:#d53f34;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--60)"><?php esc_html_e( 'SUPPORT US', 'carbon-charity' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"5%"} -->
<div class="wp-block-column" style="flex-basis:5%"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->