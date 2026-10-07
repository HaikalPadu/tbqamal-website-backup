<?php
/**
 * Page Widget
 *
 * Creates a block for the home page
 * widget areas.  It is not intended for 
 * sidebar areas  
 *
 */

class PageBlockWidget extends WP_Widget {
	
	function __construct() {
	 		parent::__construct(
	 			'page-block', // Base ID
	 			__( 'Home Block - Page Content', 'grassroots' ), // Name
	 			array( 
	 				'description' => __( 'Displays the content from the page of your choice', 'grassroots' ),
	 				'classname' => 'home-page-block'
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
      $page_id = empty($instance['page_id']) ? '' : $instance['page_id'];

      # Before the widget
      echo $before_widget;

      # Make the widget
      
      if (!empty($instance['title']))
      	echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title ;      	
      	
     	 $featured_page = new WP_Query(array('page_id' => ! empty($instance['page_id']) ? $instance['page_id'] : 0));
  			if($featured_page->have_posts()) : while($featured_page->have_posts()) : $featured_page->the_post();
  				
  				echo '<div class="home-page-content">';
  
  				the_content();
  				
  				echo '</div><!-- .home-page-content -->';
  					
  			endwhile; endif;
          wp_reset_query();

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
      $instance['page_id'] = stripslashes($new_instance['page_id']);

    return $instance;
  }

  /**
    * Creates the edit form for the widget.
    *
    */
    public function form($instance){
      //Defaults
      $instance = wp_parse_args( (array) $instance, array(
      		'title' => '',
      		'page_id' => ''
      	) 
      );


?>
	<p>
		<?php _e('This widget will display your slideshow.  Go to the Media section and select "Slides" to add your slides.', 'grassroots'); ?>
	</p>
	
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional)', 'grassroots'); ?>:</label>
	<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" /></p>

   	<p><label for="<?php echo $this->get_field_id('page_id'); ?>"><?php _e('Page', 'grassroots'); ?>:</label>
   	<?php wp_dropdown_pages(array('name' => $this->get_field_name('page_id'), 'selected' => $instance['page_id'])); ?></p>
    
<?php
  }

}// END class

	function PageBlockWidget_Init() {
		register_widget('PageBlockWidget');
	}
	add_action('widgets_init', 'PageBlockWidget_Init');
