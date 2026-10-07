<?php 

/**
 * Video Widget
 *
 * A widget to display a video
 *
 * @package		Organized Themes
 * @subpackage	Mise en Place
 * @since		1.0.0
 *
 */

class OrganizedthemesVideoWidget extends WP_Widget {
 /**
  * Declares the OrganizedthemesVideoWidget class.
  *
  */
    
    function __construct() {
 		parent::__construct(
 			'featuredvideo', // Base ID
 			__( 'Featured Video Widget', 'grassroots' ), // Name
 			array( 
 				'description' => __( 'Display a video.', 'grassroots' ),
 				'classname' => 'featured-video'
 			)
 		);
 	}
 	

  /**
    * Displays the Widget
    *
    */
	public function widget($args, $instance){
	
		extract($args);
		$title 	= empty($instance['title']) ? '' : $instance['title'];
		$video_url = empty($instance['video_url']) ? '' : $instance['video_url'];
		$embed = empty($instance['embed']) ? '' : $instance['embed'];
		
		if ( ! empty($instance['video_url'] ) ) {
		
			$video_final = wp_oembed_get( $video_url, true );
		
		} else {
		
			$video_final = ! empty($instance['embed']) ? $instance['embed'] : '';
		
		}
		
		# Before the widget
		echo $before_widget;
	
		# Make the widget
		
		if ( ! empty($instance['title'] ) )
			echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title ;
		
		echo '
		
		<div class="fit-video">
		
		';

			echo $video_final;
			
		echo '
		
		</div>
		
		';
	
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
		$instance['video_url'] = stripslashes($new_instance['video_url']);
		$instance['embed'] = stripslashes($new_instance['embed']);
		
		return $instance;
	}

  /**
    * Creates the edit form for the widget.
    *
    */
    public function form($instance){
      //Defaults
      $instance = wp_parse_args( (array) $instance, array(
      		'title'			=> '',
      		'video_url'		=> '',
      		'embed'			=> ''
      	) 
      );

?>
	
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'mise-en-place'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<?php _e('You can place the URL to a video from YouTube or Vimeo in the URL field below.  WordPress will fetch the video for you.  Otherwise place the embed code for your video into the video embed box below.', 'mise-en-place'); ?>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('video_url'); ?>"><?php _e('Video URL', 'mise-en-place'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('video_url'); ?>" name="<?php echo $this->get_field_name('video_url'); ?>" value="<?php echo esc_attr( $instance['video_url'] ); ?>" style="width:99%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('embed'); ?>"><?php _e('Video Embed Code:', 'mise-en-place'); ?></label>
		<textarea class="widefat" rows="16" cols="19" id="<?php echo $this->get_field_id('embed'); ?>" name="<?php echo $this->get_field_name('embed'); ?>"><?php echo esc_attr( $instance['embed'] ); ?></textarea>
	</p>
	
<?php }

}// END class

// Register Widget
	function OrganizedthemesVideoWidgetInit() {
		register_widget('OrganizedthemesVideoWidget');
	}
	add_action('widgets_init', 'OrganizedthemesVideoWidgetInit');
