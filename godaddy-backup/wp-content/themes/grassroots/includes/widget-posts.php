<?php
/**
 * Posts Widget
 *
 * This widget adds a list of your
 * lastest posts from the category of your
 * choosing.
 *
 */

class FeaturedPostsWidget extends WP_Widget {
	
	function __construct() {
	 		parent::__construct(
	 			'featuredposts', // Base ID
	 			__( 'Featured Posts Widget', 'grassroots' ), // Name
	 			array( 
	 				'description' => __( 'Display your recent posts', 'grassroots' ),
	 				'classname' => 'featuredposts'
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
		$posts_num = empty($instance['posts_num']) ? '' : $instance['posts_num'];
		$orderby = empty($instance['orderby']) ? '' : $instance['orderby'];
		$order = empty($instance['order']) ? '' : $instance['order'];
		$show_byline = empty($instance['show_byline']) ? '' : $instance['show_byline'];
		$show_content = empty($instance['show_content']) ? '' : $instance['show_content'];
		$content_limit = empty($instance['content_limit']) ? '' : $instance['content_limit'];
		$more_text = empty($instance['more_text']) ? '' : $instance['more_text'];
		$more_link_url = empty($instance['more_link_url']) ? '' : $instance['more_link_url'];
		$more_link = empty($instance['more_link']) ? '' : $instance['more_link'];

      # Before the widget
      echo $before_widget;

      # Make the widget
      
		if (!empty($instance['title']))
			echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title ;
 
		$query_args = array(
     			'post_type' => 'post',
     			'cat'       => $instance['posts_cat'],
     			'showposts' => $instance['posts_num'],
     			'orderby'   => $instance['orderby'],
     			'order'     => $instance['order'],
     		);
     
     		$featured_posts = new WP_Query( $query_args );
     			
     			global $post;
     				
     				if ( $featured_posts->have_posts() ) : while ( $featured_posts->have_posts() ) : $featured_posts->the_post();
     					echo '<article class="' . implode( ' ', get_post_class( 'clearfix' ) ) . '">';
     					?>
     					
     					<?php if ( has_post_format( 'video' ) ) { ?>
     						
     						<div class="post-video">
     						
     							<div class="fit-video"><?php echo get_post_meta($post->ID, "slide_video", TRUE); ?></div>
     						
     						</div>
     					
     					<?php } elseif ( has_post_thumbnail() ) { ?>
     					
     						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'home-thumbnail' ); ?></a>
     					
     					<?php } ?>
     				
     					<?php
     					
     					printf( '<h3><a href="%s" title="%s">%s</a></h3>', get_permalink(), the_title_attribute( 'echo=0' ), get_the_title() );
     					
     					if ( ! empty( $instance['show_byline'] ) ) {
     					
     						get_template_part( 'layouts/post-meta' );
     					
     					}
     						if ( ! empty( $instance['show_content'] ) ) {
     						
     							if ( 'excerpt' == $instance['show_content'] ) {
     						
     								the_excerpt();
     								
     							} elseif ( 'content-limit' == $instance['show_content'] ) {
     							
     								the_content_limit( (int) $instance['content_limit'], esc_html( $instance['more_text'] ) );
     							
     							} else {
     							
     								global $more;
     								$more = 0;
     								the_content( esc_html( $instance['more_text'] ) );
     							
     							}
     						
     						}
     						     
     					echo '</article>'."\n\n";
     		
     				endwhile; endif;
 			
 			if (!empty($instance['more_link']))
 				echo '<a class="more-posts" href="' . $more_link_url . '">' . $more_link . "</a>";
 			
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
		$instance['posts_cat'] = stripslashes($new_instance['posts_cat']);
		$instance['posts_num'] = stripslashes($new_instance['posts_num']);
		$instance['orderby'] = stripslashes($new_instance['orderby']);
		$instance['order'] = stripslashes($new_instance['order']);
		$instance['show_byline'] = ! empty( $new_instance['show_byline'] ) ? stripslashes($new_instance['show_byline']) : '';
		$instance['show_content'] = stripslashes($new_instance['show_content']);
		$instance['content_limit'] = stripslashes($new_instance['content_limit']);
		$instance['more_text'] = stripslashes($new_instance['more_text']);
		$instance['more_link'] = stripslashes($new_instance['more_link']);
		$instance['more_link_url'] = stripslashes($new_instance['more_link_url']);

    return $instance;
  }

  /**
    * Creates the edit form for the widget.
    *
    */
    public function form($instance){
      //Defaults
      $instance = wp_parse_args( (array) $instance, array(
			'title' 			=> '',
			'posts_cat'			=>'',
			'posts_num'			=>'3',
			'orderby'			=>'',
			'order'				=>'',
			'show_byline'		=> 0,
			'show_content'		=> 'excerpt',
			'content_limit'		=> '',
			'more_text'			=> __( ' Read More...', 'grassroots' ),
      		'more_link'			=>'',
      		'more_link_url'		=>''
      		
      	) 
      );

?>
	<p>
		<?php _e('This widget allows you to display a list of posts on your home page or other widget area.', 'grassroots'); ?>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'grassroots'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'posts_cat' ); ?>"><?php _e( 'Category', 'grassroots' ); ?>:</label>
		<?php
		$categories_args = array(
			'name'            => $this->get_field_name( 'posts_cat' ),
			'selected'        => $instance['posts_cat'],
			'orderby'         => 'Name',
			'hierarchical'    => 1,
			'show_option_all' => __( 'All Categories', 'grassroots' ),
			'hide_empty'      => '0',
		);
		wp_dropdown_categories( $categories_args ); ?>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'posts_num' ); ?>"><?php _e( 'Number of Posts to Show', 'grassroots' ); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id( 'posts_num' ); ?>" name="<?php echo $this->get_field_name( 'posts_num' ); ?>" value="<?php echo esc_attr( $instance['posts_num'] ); ?>" size="2" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e( 'Order By', 'grassroots' ); ?>:</label>
		<select id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>">
			<option value="date" <?php selected( 'date', $instance['orderby'] ); ?>><?php _e( 'Date', 'grassroots' ); ?></option>
			<option value="title" <?php selected( 'title', $instance['orderby'] ); ?>><?php _e( 'Title', 'grassroots' ); ?></option>
			<option value="parent" <?php selected( 'parent', $instance['orderby'] ); ?>><?php _e( 'Parent', 'grassroots' ); ?></option>
			<option value="ID" <?php selected( 'ID', $instance['orderby'] ); ?>><?php _e( 'ID', 'grassroots' ); ?></option>
			<option value="comment_count" <?php selected( 'comment_count', $instance['orderby'] ); ?>><?php _e( 'Comment Count', 'grassroots' ); ?></option>
			<option value="rand" <?php selected( 'rand', $instance['orderby'] ); ?>><?php _e( 'Random', 'grassroots' ); ?></option>
		</select>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'Sort Order', 'grassroots' ); ?>:</label>
		<select id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>">
			<option value="DESC" <?php selected( 'DESC', $instance['order'] ); ?>><?php _e( 'Descending (3, 2, 1)', 'grassroots' ); ?></option>
			<option value="ASC" <?php selected( 'ASC', $instance['order'] ); ?>><?php _e( 'Ascending (1, 2, 3)', 'grassroots' ); ?></option>
		</select>
	</p>
	
	<p>
		<input id="<?php echo $this->get_field_id( 'show_byline' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'show_byline' ); ?>" value="1" <?php checked( $instance['show_byline'] ); ?>/>
		<label for="<?php echo $this->get_field_id( 'show_byline' ); ?>"><?php _e( 'Show author, date and category?', 'grassroots' ); ?></label>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'show_content' ); ?>"><?php _e( 'Content Display', 'grassroots' ); ?>:</label>
		<select id="<?php echo $this->get_field_id( 'show_content' ); ?>" name="<?php echo $this->get_field_name( 'show_content' ); ?>">
			<option value="content" <?php selected( 'content' , $instance['show_content'] ); ?>><?php _e( 'Show Content', 'grassroots' ); ?></option>
			<option value="excerpt" <?php selected( 'excerpt' , $instance['show_content'] ); ?>><?php _e( 'Show Excerpt', 'grassroots' ); ?></option>
			<option value="content-limit" <?php selected( 'content-limit' , $instance['show_content'] ); ?>><?php _e( 'Show Content Limit', 'grassroots' ); ?></option>
			<option value="" <?php selected( '' , $instance['show_content'] ); ?>><?php _e( 'No Content', 'grassroots' ); ?></option>
		</select>
		<br />
		<label for="<?php echo $this->get_field_id( 'content_limit' ); ?>"><?php _e( 'Limit content to', 'grassroots' ); ?>
			<input type="text" id="<?php echo $this->get_field_id( 'image_alignment' ); ?>" name="<?php echo $this->get_field_name( 'content_limit' ); ?>" value="<?php echo esc_attr( intval( $instance['content_limit'] ) ); ?>" size="3" />
			<?php _e( 'characters', 'grassroots' ); ?>
		</label>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'more_text' ); ?>"><?php _e( 'More Text', 'grassroots' ); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id( 'more_text' ); ?>" name="<?php echo $this->get_field_name( 'more_text' ); ?>" value="<?php echo esc_attr( $instance['more_text'] ); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('more_link'); ?>"><?php _e('Link To Full Blog Text', 'grassroots'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('more_link'); ?>" name="<?php echo $this->get_field_name('more_link'); ?>" value="<?php echo esc_attr( $instance['more_link'] ); ?>" style="width:95%;" />
	</p>
   	
   	<p>
   		<label for="<?php echo $this->get_field_id('more_link_url'); ?>"><?php _e('Link To Full Blog URL', 'grassroots'); ?>:</label>
   		<input type="text" id="<?php echo $this->get_field_id('more_link_url'); ?>" name="<?php echo $this->get_field_name('more_link_url'); ?>" value="<?php echo esc_attr( $instance['more_link_url'] ); ?>" style="width:95%;" />
   	</p>
   	
<?php
  }

}// END class

function FeaturedPostsInit() {
	register_widget('FeaturedPostsWidget');
}
add_action('widgets_init', 'FeaturedPostsInit');
