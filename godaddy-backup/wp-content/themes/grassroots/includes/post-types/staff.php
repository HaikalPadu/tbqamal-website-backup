<?php

// Register the staff post type and staff group taxonomy
	if ( ! function_exists( 'organizedthemes_staff_register' ) ):

		function organizedthemes_staff_register() {
	
			$staff_slug = of_get_option('staff_slug', 'staff');

			register_post_type( 'staff',
				array(
					'labels' 				=> array(
					'name' 					=> __( 'Staff', 'grassroots' ),
					'singular_name' 		=> __( 'Staff', 'grassroots' ),
					'add_new' 				=> __( 'Add New Staff Member', 'grassroots' ),
					'add_new_item' 			=> __( 'Add New Staff Member', 'grassroots' ),
					'edit' 					=> __( 'Edit', 'grassroots' ),
					'edit_item' 			=> __( 'Edit Staff Member', 'grassroots' ),
					'view' 					=> __( 'View Staff', 'grassroots' ),
					'view_item' 			=> __( 'View Staff Member', 'grassroots' ),
					'not_found' 			=> __( 'No staff members', 'grassroots' ),
					'not_found_in_trash' 	=> __( 'Your staff is not in the trash', 'grassroots' ),
				),
					'public' 				=> true,
					'show_ui' 				=> true,
					'hierarchical' 			=> true,
					'publicly_queryable' 	=> true,
					'exclude_from_search' 	=> false,
					'show_in_nav_menus'		=> false,
					'rewrite' 				=> array( 'slug' => $staff_slug ),
		    		'supports' 				=> array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
				)
				
			);
		
		// Register Staff Group Taxonomy
			
			$staff_group_slug = of_get_option('staff_group_slug', 'staff-group');
			
			register_taxonomy( 'staff-group', 'staff', 
				array( 
					'hierarchical' => true, 
						'labels' => array(
							'name' 				=> __( 'Staff Group', 'grassroots' ),
							'singular_name' 	=> __( 'Staff Group', 'grassroots' ),
							'search_items' 		=> __( 'Search Staff Groups', 'grassroots' ),
							'popular_items' 	=> __( 'Popular Staff Groups', 'grassroots' ),
							'all_items' 		=> __( 'All Staff Types', 'grassroots' ),
							'parent_item' 		=> __( 'Parent Staff Groups', 'grassroots' ),
							'parent_item_colon' => __( 'Parent Staff Groups:', 'grassroots' ),
							'edit_item' 		=> __( 'Edit Staff Group', 'grassroots' ),
							'update_item' 		=> __( 'Update Staff Group', 'grassroots' ),
							'add_new_item' 		=> __( 'Add New Staff Group', 'grassroots' ),
							'new_item_name' 	=> __( 'New Staff Group Name', 'grassroots' ),
						), 
					'query_var' => true,
					'show_in_nav_menus' => true,
					'rewrite' => array( 'slug' => $staff_group_slug, 'with_front' => false )
					) 
			);
			
		}
		
	endif; // organizedthemes_staff_register
	
	add_action( 'init', 'organizedthemes_staff_register' );
	
//change title to staff member name
	function organizedthemes_staff_title( $title ){
	     $screen = get_current_screen();
	 
	     if  ( 'staff' == $screen->post_type ) {
	          $title = 'Enter Staff Member Name';
	     }
	 
	     return $title;
	}
	 
	add_filter( 'enter_title_here', 'organizedthemes_staff_title' );
			

// Admin Columns for staff
	add_filter('manage_staff_posts_columns', 'staff_table_head');
	
	function staff_table_head( $defaults ) {
	
	    $defaults['featured_image']	= 'Featured Image';
	    $defaults['content']		= 'Description';
	    $defaults['group']			= 'Staff Group';
	    $defaults['job_title']		= 'Job Title';
	    
	    unset($defaults['date']);
	    
	    return $defaults;
	}
	
	add_action( 'manage_staff_posts_custom_column', 'staff_table_content', 10, 2 );
	
	function staff_table_content( $column_name, $post_id ) {
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
	    
	    if ($column_name == 'job_title') {
	    
	    	echo get_post_meta( $post_id, 'title', true );
	    }
	    
	    if ($column_name == 'group') {
	    
	    	echo get_the_term_list($post->ID, 'staff-group', '', ', ','');
	    }
	
	}

// Add sorting for staff items
	function organizedthemes_staff_filter() {
	
	    // only display these taxonomy filters on desired custom post_type listings
	    global $typenow;
	    if ($typenow == 'staff') {
	
	        // create an array of taxonomy slugs you want to filter by - if you want to retrieve all taxonomies, could use get_taxonomies() to build the list
	        $filters = array('staff-group');
	
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
					$taxonomy_field = ! empty( $_GET[ $tax_slug ] ) ? $_GET[$tax_slug] : '';

	                // output each select option line, check against the last $_GET to show the current option selected
	                echo '<option value='. $term->slug, $taxonomy_field == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
	            }
	            echo "</select>";
	        }
	    }
	}
	
	
	add_action( 'restrict_manage_posts', 'organizedthemes_staff_filter' );