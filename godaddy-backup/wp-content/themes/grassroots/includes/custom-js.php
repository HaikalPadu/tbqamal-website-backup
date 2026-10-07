<?php

/**
 * Sets up and fires our javascript.  It is loaded
 * by wp_footer in footer.php
 *
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 *
 *
 */

function organizedthemes_custom_js_hook( ) { ?>

	<script>
	
	// Slicknav	
		jQuery('#primary-menu').slicknav({
			prependTo:'#header-content',
			label: '<?php echo of_get_option('mobile_navigation_name','') ?>'
		});
	
	// Add Header Class On Scroll
		jQuery(function() {
			jQuery(window).scroll(function() {	
				if ( jQuery(this).scrollTop() > 100 ) {
					jQuery('#header').addClass('scroll');
				} else {
					jQuery('#header').removeClass('scroll');
				}
			});
		});
	
	// Smooth Scrolling 
		jQuery(function($) {
		  $('a[href*="#"]:not([href="#"],[href="#tab-description"],[href="#tab-reviews"])').click(function() {
		    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		      var target = $(this.hash);
		      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        $('html,body').animate({
		          scrollTop: target.offset().top - 100
		        }, 1000);
		        return false;
		      }
		    }
		  });
		});
	
	<?php if ( of_get_option( 'gallery' ) == 'yes' ) { ?>
		
	// Load Lightbox and add lightbox class and rel for prev/next functionality
		jQuery(document).ready(function(){
	    	jQuery('.lightbox').lightbox();
	    		
	    		jQuery('div.gallery a').attr('rel', 'gallery');
	    		jQuery('div.images a').attr('rel', 'gallery');
	    
	    });
	
	// Add lightbox class to single images with links:
		jQuery('a').each(function(){
			
			if ( this.href.toLowerCase().substr(-4).indexOf('.jpg') < 0 &&
			     this.href.toLowerCase().substr(-5).indexOf('.jpeg') < 0 &&
			     this.href.toLowerCase().substr(-4).indexOf('.png') < 0 &&
			     this.href.toLowerCase().substr(-4).indexOf('.gif') < 0 )
			return;
	
			var $lnk = jQuery(this); 
			
			$lnk.addClass('lightbox');
		
		});
	
	<?php } ?>

	/* equal height boxes */
    equalheight = function(container){

    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0;
    jQuery(container).each(function() {

        $el = jQuery(this);
        jQuery($el).height('auto')
        topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
    }

    jQuery(window).on( "load",function() {
        equalheight('#footer-sidebar aside.widget');
    });

    jQuery(window).resize(function(){
        equalheight('#footer-sidebar aside.widget');
    });
	
	</script>

<?php }

add_action( 'wp_footer', 'organizedthemes_custom_js_hook', 20 );

