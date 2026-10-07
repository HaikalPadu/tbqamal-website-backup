<?php

/**
 * Sets options for queries before they are run
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 *
 */
	function united_pre_posts( $query ) {
	    
	    if ( is_tax( 'staff-group' ) && $query->is_main_query() ) {
	        // displays in post order
	        $query->set( 'order', 'ASC' );
	        $query->set( 'orderby', 'menu_order' );
	        return;
	    }
	    
	    if ( is_tax( 'sponsor-group' ) && $query->is_main_query() ) {
	        // displays in post order
	        $query->set( 'order', 'ASC' );
	        $query->set( 'orderby', 'menu_order' );
	        return;
	    }
	    
	}
	add_action( 'pre_get_posts', 'united_pre_posts', 1 );