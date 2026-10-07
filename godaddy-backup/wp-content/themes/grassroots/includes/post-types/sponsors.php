<?php
	
	// Register the sponsor post type and sponsor group taxonomy
		if ( ! function_exists( 'organizedthemes_sponsor_register' ) ):
	
			function organizedthemes_sponsor_register() {
	
				$sponsor_slug = of_get_option('sponsor_slug', 'sponsor');
				
				$sponsor_group_slug = of_get_option('sponsor_group_slug', 'sponsor');
				
					register_post_type( 'sponsor',
						array(
							'labels' 				=> array(
							'name' 					=> __( 'Sponsors', 'grassroots' ),
							'singular_name' 		=> __( 'Sponsor', 'grassroots' ),
							'add_new' 				=> __( 'Add New Sponsor', 'grassroots' ),
							'add_new_item' 			=> __( 'Add New Sponsor', 'grassroots' ),
							'edit' 					=> __( 'Edit Sponsor', 'grassroots' ),
							'edit_item' 			=> __( 'Edit Sponsor', 'grassroots' ),
							'view' 					=> __( 'View Sponsor', 'grassroots' ),
							'view_item' 			=> __( 'View Sponsor', 'grassroots' ),
							'not_found' 			=> __( 'No sponsors', 'grassroots' ),
							'not_found_in_trash' 	=> __( 'Your sponsors are not in the trash', 'grassroots' ),
						),
							'public' 				=> true,
							'show_ui' 				=> true,
							'hierarchical' 			=> true,
							'publicly_queryable' 	=> true,
							'exclude_from_search' 	=> false,
							'rewrite' 				=> array( 'slug' => $sponsor_slug ),
							'menu_icon' 			=> '',
				    		'supports' 				=> array('title', 'editor', 'thumbnail', 'page-attributes')
						)
						
					);
				
				// Register Sponsor Group Taxonomy
					register_taxonomy( 'sponsor-group', 'sponsor', 
						array( 
							'hierarchical' => true, 
								'labels' => array(
									'name' 				=> __( 'Sponsor Group', 'grassroots' ),
									'singular_name' 	=> __( 'Sponsor Group', 'grassroots' ),
									'search_items' 		=> __( 'Search Sponsor Groups', 'grassroots' ),
									'popular_items' 	=> __( 'Popular Sponsor Groups', 'grassroots' ),
									'all_items' 		=> __( 'All Sponsor Group', 'grassroots' ),
									'parent_item' 		=> __( 'Parent Sponsor Group', 'grassroots' ),
									'parent_item_colon' => __( 'Parent Sponsor Group:', 'grassroots' ),
									'edit_item' 		=> __( 'Edit Sponsor Group', 'grassroots' ),
									'update_item' 		=> __( 'Update Sponsor Group', 'grassroots' ),
									'add_new_item' 		=> __( 'Add New Sponsor Group', 'grassroots' ),
									'new_item_name' 	=> __( 'New Sponsor Group Name', 'grassroots' ),
								), 
							'query_var' => true,
							'rewrite' => array( 'slug' => $sponsor_group_slug , 'with_front' => false )
							) 
					);
			
			}
			
		endif; // organizedthemes_sponsor_register
			
		add_action( 'init', 'organizedthemes_sponsor_register' );


// Admin Columns for sponsor
	add_filter('manage_sponsor_posts_columns', 'sponsor_table_head');
	
	function sponsor_table_head( $defaults ) {
	
	    $defaults['featured_image']	= 'Featured Image';
	    $defaults['content']		= 'Description';
	    $defaults['group']			= 'Sponsor Group';
	    
	    unset($defaults['date']);
	    
	    return $defaults;
	}
	
	add_action( 'manage_sponsor_posts_custom_column', 'sponsor_table_content', 10, 2 );
	
	function sponsor_table_content( $column_name, $post_id ) {
		
		$post = get_post($post_id);

	    if ($column_name == 'featured_image') {
	    	$featured_image = get_post_meta( $post_id, '_thumbnail_id', true );
	    		echo  '<img style="width: 100%; height: auto" src="';
	    		echo wp_get_attachment_url( $featured_image );
	    		echo '" />';
	    }
	    

	
	    if ($column_name == 'content') {
	    
			echo the_excerpt();
	    }
	    
	    if ($column_name == 'group') {
	    
	    	echo get_the_term_list($post->ID, 'sponsor-group', '', ', ','');
	    }
	
	}

// Add sorting for sponsor items
	function organizedthemes_sponsor_filter() {
	
	    // only display these taxonomy filters on desired custom post_type listings
	    global $typenow;
	    if ($typenow == 'sponsor') {
	
	        // create an array of taxonomy slugs you want to filter by - if you want to retrieve all taxonomies, could use get_taxonomies() to build the list
	        $filters = array('sponsor-group');
	
	        foreach ($filters as $tax_slug) {
	            // retrieve the taxonomy object
	            $tax_obj = get_taxonomy($tax_slug);
	            $tax_name = $tax_obj->labels->name;
	            // retrieve array of term objects per taxonomy
	            $terms = get_terms($tax_slug);
	
	            // output html for taxonomy dropdown filter
	            echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
	            echo "<option value=''>Show All $tax_name</option>";
	            foreach ($terms as $term) {
					$taxonomy_field = ! empty( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : '';

	                // output each select option line, check against the last $_GET to show the current option selected
	                echo '<option value='. $term->slug, $taxonomy_field == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
	            }
	            echo "</select>";
	        }
	    }
	}
	
	
	add_action( 'restrict_manage_posts', 'organizedthemes_sponsor_filter' );
