<?php
/**
 * Sponsor Widget
 *
 * Displays logos of your sponsors in a sliding carousel
 *
 */

class SponsorsWidgetScroll extends WP_Widget {
	
	function __construct() {
	 		parent::__construct(
	 			'sponsor-scroll', // Base ID
	 			__( 'Sponsor Widget', 'grassroots' ), // Name
	 			array( 
	 				'description' => __( 'Displays a list of your sponsor logos', 'grassroots' ),
	 				'classname' => 'sponsor-scroll'
	 			)
	 		);
	 	}

  /**
    * Displays the Widget
    *
    */
    public function widget($args, $instance){
      extract($args);
      $title = empty($instance['title']) ? '' : $instance['title'];
      $posts_cat = empty($instance['posts_cat']) ? '' : $instance['posts_cat'];
      $speed = empty($instance['speed']) ? '' : $instance['speed'];
      

      # Before the widget
      echo $before_widget;

      # Make the widget
      
		if (!empty($instance['title']))
			echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title ;
		
		echo '<div class="slick-slider">';
		
			if ( empty($posts_cat) ) {
				$terms = get_terms( array(
				'taxonomy'   => 'sponsor-group',
				'hide_empty' => false,
				'orderby'    => 'name',
				'order'      => 'ASC',
				'number'     => 1
				));
				if ( ! empty($terms) && ! is_wp_error($terms) ) {
					$posts_cat = $terms[0]->term_id;
				}
			}

     		$args = array( 
     			'orderby' 			=> 'menu_order', 
     			'order' 			=> 'asc',
     			'showposts' 		=> -1,
     		   	'tax_query' 		=> array(
					array(
						'taxonomy' => 'sponsor-group',
						'field' => 'id',
						'terms' => $posts_cat
					),	
     		   	)
     		   );
     		   $recent = new WP_Query( $args );
     		   
     		while($recent->have_posts()) : $recent->the_post(); ?>
     		
     			<div id="slick-<?php the_ID(); ?>" class="slick-item"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('sponsor-small' ); ?></a></div>
     		
     		<?php endwhile; ?>
 		
 		</div> 
 		
		<script type="text/javascript">
		
			
			jQuery('.slick-slider').slick({
			  dots: false,
			  infinite: true,
			  speed: 300,
			  slidesToShow: 6,
			  slidesToScroll: 1,
			  autoplay: true,
			  autoplaySpeed: <?php //echo $speed; ?> 3000,
			  responsive: [
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 6,
			        slidesToScroll: 1,
			        autoplay: true
			      }
			    },
			    {
			      breakpoint: 767,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll: 1,
			        autoplay: true
			      }
			    },
			    {
			      breakpoint: 520,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 1,
			        autoplay: true
			      }
			    }
			  ]
			});
			
		
		</script>
 		
 		<?php
 		
      # After the widget
      echo $after_widget;
  }

  /**
    * Saves the widgets settings.
    *
    */
    public function update($new_instance, $old_instance){
      $instance = $old_instance;
      $instance['title'] = stripslashes($new_instance['title']);
      $instance['posts_cat'] = ! empty( $new_instance['posts_cat'] ) ? stripslashes($new_instance['posts_cat']) : '';
      $instance['speed'] = ! empty( $new_instance['speed'] ) ? stripslashes($new_instance['speed']) : '';

    return $instance;
  }

  /**
    * Creates the edit form for the widget.
    *
    */
    public function form($instance){
      //Defaults
      $instance = wp_parse_args( (array) $instance, array(
      		'title' 	=> '',
      		'posts_cat'	=>'',
      		'speed'		=>'2000'
      		
      	) 
      );

?>
	<p>
		<?php _e('This widget allows you to display the logos of your sponsors.', 'grassroots'); ?>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'grassroots'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'posts_cat' ); ?>"><?php _e( 'Sponsor Group', 'grassroots' ); ?>:</label>
		<?php
		$categories_args = array(
			'name'            => $this->get_field_name( 'posts_cat' ),
			'selected'        => $instance['posts_cat'],
			'orderby'         => 'Name',
			'hierarchical'    => 1,
			'hide_empty'      => '0',
			'taxonomy'           => 'sponsor-group'
		);
		wp_dropdown_categories( $categories_args ); ?>
	</p>
	
	<!--p>
		<label for="<?php //echo $this->get_field_id('speed'); ?>"><?php //_e('Animation Speed', 'grassroots'); ?>:</label>
		<input type="text" id="<?php //echo $this->get_field_id('speed'); ?>" name="<?php //echo $this->get_field_name('speed'); ?>" value="<?php //echo esc_attr( $instance['speed'] ); ?>" style="width:95%;" />
	</p-->
     
<?php
  }

}// END class

function SponsorsScrollInit() {
	register_widget('SponsorsWidgetScroll');
}
add_action('widgets_init', 'SponsorsScrollInit');
