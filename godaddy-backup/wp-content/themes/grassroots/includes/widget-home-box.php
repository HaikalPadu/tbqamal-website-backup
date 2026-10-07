<?php
/**
 * Home Box Widget
 *
 *
 */

class OrganizedThemes_Home_Box_Widget extends WP_Widget {
	
	function __construct() {
	 		parent::__construct(
	 			'home-box', // Base ID
	 			__( 'Home Box', 'grassroots' ), // Name
	 			array( 
	 				'description' => __( 'Displays an image with text and link', 'grassroots' ),
	 				'classname' => 'organizedthemes-home-box'
	 			)
	 		);
	 	}

  /**
    * Displays the Widget
    *
    */
   public function widget($args, $instance){
      extract($args);
      $title 	 	= empty($instance['title']) ? '' : $instance['title'];
      $content 	 	= empty($instance['content']) ? '' : $instance['content'];
      $link_url 	= empty($instance['link_url']) ? '' : $instance['link_url'];
      $image_url 	= empty($instance['image_url']) ? '' : $instance['image_url'];
      $button 		= empty($instance['button']) ? '' : $instance['button'];
      $align 		= empty($instance['align']) ? '' : $instance['align'];
    	
      # Before the widget
      echo $before_widget;

      # Front end of the widget
		
		if ( !empty($instance['link_url'] ) ) {
			echo '<a href="' . $link_url . '">';
		}
		
		if ( !empty($instance['image_url'] ) && ! empty($args['widget_id']) ) {
			echo '<div class="image-holder ' . $align . '">';
				
				echo '
				
				<style>
				
					#'.$args['widget_id'] .' .image-holder {
						background-image: url(' . $image_url . ');
					}
					
				</style>';
				
			echo '</div>';
		}
		
		if ( !empty($instance['link_url'] ) ) {
			echo '</a>';
		}
		
		echo '<div class="home-box-content ' . $align . ' clearfix">';
		
			if ( !empty($instance['title'] ) )
				echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title ;
			
			echo apply_filters('the_content', $content);
			
			if ( !empty($instance['link_url'] ) ) {
				echo '<a class="button" href="' . $link_url . '">' . $button . '</a>';
			}
		
		echo '</div>';		
					
		
      # After the widget
      echo $after_widget;
  }

  /**
    * Saves the widgets settings.
    *
    */
	public function update($new_instance, $old_instance){
		$instance 				= $old_instance;
		$instance['title'] 		= stripslashes($new_instance['title']);
		$instance['content'] 	= stripslashes($new_instance['content']);
		$instance['image_url'] 	= stripslashes($new_instance['image_url']);
		$instance['link_url'] 	= stripslashes($new_instance['link_url']);
		$instance['align'] 		= stripslashes($new_instance['align']);
		$instance['button'] 	= stripslashes($new_instance['button']);
	
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
      		'content'	=>'',   		
      		'image_url'	=>'',
      		'link_url'	=>'',
      		'align'		=>'',
      		'button'	=>''
      	) 
      );

	?>

	
	<div class="organizedthemes-two-column-widget">
		
		<p>
			<?php _e('This widget allows you to display an image beside a block of text with an optional link.', 'grassroots'); ?>
		</p>
		
		<hr />
		
		<div class="organizedthemes-left-column">
	
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'grassroots'); ?>:</label>
				<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:99%;" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('image_url'); ?>"><?php _e('Background Image', 'grassroots'); ?>:</label>
				<input type="text" id="upload_image_button" class="image_url" name="<?php echo $this->get_field_name('image_url'); ?>" value="<?php echo esc_url( $instance['image_url'] ); ?>" style="width:99%;" />
				
				<input id="homebox-image-upload" class="button" type="button" value="<?php _e('Choose An Image', 'grassroots'); ?>" />
				<img class="organizedthemes-preview" src="<?php echo esc_url( $instance['image_url'] ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'align' ); ?>"><?php _e( 'Left or Right Image', 'grassroots' ); ?>:</label>
				<select style="width: 100%;" id="<?php echo $this->get_field_id( 'align' ); ?>" name="<?php echo $this->get_field_name( 'align' ); ?>">
				
					<option value="left-image" <?php selected( 'left-image', $instance['align'] ); ?>><?php _e( 'Left Image', 'grassroots' ); ?></option>
					
					<option value="right-image" <?php selected( 'right-image', $instance['align'] ); ?>><?php _e( 'Right Image', 'grassroots' ); ?></option>
					
					
				</select>
			</p>
			
		</div>
		
		<div class="organizedthemes-right-column">
		
			<p>
				<label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Content:', 'grassroots'); ?></label>
				<textarea class="widefat" rows="12" cols="9" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo esc_attr( $instance['content'] ); ?></textarea>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('button'); ?>"><?php _e('Button Text', 'grassroots'); ?>:</label>
				<input type="text" id="<?php echo $this->get_field_id('button'); ?>" name="<?php echo $this->get_field_name('button'); ?>" value="<?php echo esc_attr( $instance['button'] ); ?>" style="width:99%;" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('link_url'); ?>"><?php _e('Button URL', 'grassroots'); ?>:</label>
				<input type="text" id="<?php echo $this->get_field_id('link_url'); ?>" name="<?php echo $this->get_field_name('link_url'); ?>" value="<?php echo esc_attr( $instance['link_url'] ); ?>" style="width:99%;" />
			</p>
				
		</div>
	
	</div>
		    
<?php
  }

}// END class

function OrganizedThemes_Home_Box_Widget_Script() {
	
		wp_enqueue_media();
	    wp_enqueue_script( 'welcome-admin', get_template_directory_uri() .'/js/welcome-admin.js', false, false, true );
		
}
add_action( 'admin_enqueue_scripts', 'OrganizedThemes_Home_Box_Widget_Script' );

function OrganizedThemes_Home_Box_Widget_Init() {

	register_widget('OrganizedThemes_Home_Box_Widget');

}
add_action('widgets_init', 'OrganizedThemes_Home_Box_Widget_Init');


