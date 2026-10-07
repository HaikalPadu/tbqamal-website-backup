<?php
/**
 * Attention Widget
 *
 * A small widget to catch the attention of your visitors 
 *
 */

class OrganizedThemesAttentionWidget extends WP_Widget {
	
	function __construct() {
	 		parent::__construct(
	 			'attention-block', // Base ID
	 			__( 'Attention Widget', 'grassroots' ), // Name
	 			array( 
	 				'description' => __( 'Displays a small block to catch visitors attention', 'grassroots' ),
	 				'classname' => 'attention-block'
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
      $link = empty($instance['link']) ? '' : $instance['link'];
      $button = empty($instance['button']) ? '' : $instance['button'];

      # Before the widget
      echo $before_widget;

      # Make the widget
      		

		if (!empty($instance['title'])) 
			echo '<div class="attention-title"><h3 class="widget-title">' . $title . '</h3></div>';
			
		if (!empty($instance['link']))
			echo '<div class="attention-button"><a class="button" href="' . $link . '">' . $button . '</a></div>';

  	    

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
      $instance['link'] = stripslashes($new_instance['link']);
      $instance['button'] = stripslashes($new_instance['button']);

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
      		'link' => '',
      		'button' => ''
      	) 
      );


?>
	
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'grassroots'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link URL', 'grassroots'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" value="<?php echo esc_attr( $instance['link'] ); ?>" style="width:95%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('button'); ?>"><?php _e('Button Text', 'grassroots'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('button'); ?>" name="<?php echo $this->get_field_name('button'); ?>" value="<?php echo esc_attr( $instance['button'] ); ?>" style="width:95%;" />
	</p>
   
    
<?php
  }

}// END class

function OrganizedThemesAttentionWidget_Init() {
	register_widget('OrganizedThemesAttentionWidget');
}

add_action('widgets_init', 'OrganizedThemesAttentionWidget_Init');
