<?php

class otfacebookWidget extends WP_Widget {
	
	function __construct() {
	 		parent::__construct(
	 			'otfacebook', // Base ID
	 			__( 'Facebook Page Widget', 'grassroots' ), // Name
	 			array( 
	 				'description' => __( 'Display a Facebook Like Box', 'grassroots' ),
	 				'classname' => 'organizedthemes-facebook'
	 			)
	 		);
	 	}

    public function widget($args, $instance){
      extract($args);
      $title = empty($instance['title']) ? '' : $instance['title'];
      $embed = empty($instance['embed']) ? '' : $instance['embed'];
      

      echo $before_widget;
	  
	  if (!empty($instance['title']))
	  	echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title ;
	  
	  echo '<iframe src="//www.facebook.com/plugins/likebox.php?href='. $embed .'&amp;width=280&amp;height=258&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;show_border=false&amp;header=false&amp;appId=244091198947495" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:280px; height:258px;" allowTransparency="true"></iframe>';
	  		
      echo $after_widget;
  }

    public function update($new_instance, $old_instance){
      $instance = $old_instance;
      $instance['title'] = stripslashes($new_instance['title']);
      $instance['embed'] = stripslashes($new_instance['embed']);

    return $instance;
  }

    public function form($instance){
      //Defaults
      $instance = wp_parse_args( (array) $instance, array(
      		'title' => '',
      		'embed'=>''
      	) 
      );

      $embed = htmlspecialchars($instance['embed']);
      
      ?>
	
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'grassroots'); ?>:</label>
	<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" /></p>
	
	<?php
    
      echo '<p><label for="' . $this->get_field_name('embed') . '">' . __('Facebook Page URL', 'grassroots') . ' <input style="width: 290px;" id="' . $this->get_field_id('embed') . '" name="' . $this->get_field_name('embed') . '" type="text" value="' . $embed . '" /></label></p>';
      echo  '<p>' . __('Only Facebook "Pages" are allowed to use the like box.  Personal profiles and groups are not allowed to by Facebook.', 'grassroots') . '</p>';
  }

}// END class

	function otfacebookInit() {
		register_widget('otfacebookWidget');
  	}
	
	add_action('widgets_init', 'otfacebookInit');
	