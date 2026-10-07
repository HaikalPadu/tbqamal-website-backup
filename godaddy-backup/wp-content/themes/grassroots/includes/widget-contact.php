<?php

// Map & Times Widget

class OrganizedThemes_Contact extends WP_Widget {
	
	function __construct() {
	 		parent::__construct(
	 			'OrganizedThemes_Contact', // Base ID
	 			__( 'Contact', 'grassroots' ), // Name
	 			array( 
	 				'description' => __( 'Displays address, business hours and a map.', 'grassroots' ),
	 				'classname' => 'organizedthemes-contact'
	 			)
	 		);
	 	}
 
    public function widget($args, $instance) {        
        extract( $args );
        
        
        $title		= !isset($instance['contact_title']) ? ''    : $instance['contact_title'];
        $name		= !isset($instance['contact_name']) ? ''     : $instance['contact_name'];
        $times1		= !isset($instance['contact_times1']) ? ''   : $instance['contact_times1'];
        $times2		= !isset($instance['contact_times2']) ? ''   : $instance['contact_times2'];
        $times3		= !isset($instance['contact_times3']) ? ''   : $instance['contact_times3'];
        $times4		= !isset($instance['contact_times4']) ? ''   : $instance['contact_times4'];
        $times5		= !isset($instance['contact_times5']) ? ''   : $instance['contact_times5'];
        
        $open		= !isset($instance['contact_open']) ? ''     : $instance['contact_open'];
        $street		= !isset($instance['contact_street']) ? ''   : $instance['contact_street'];
        $address2	= !isset($instance['contact_address2']) ? '' : $instance['contact_address2'];
        $city		= !isset($instance['contact_city']) ? ''     : $instance['contact_city'];
        $phone		= !isset($instance['contact_phone']) ? ''    : $instance['contact_phone'];
        $email		= !isset($instance['contact_email']) ? ''    : $instance['contact_email'];    
        $phone		= !isset($instance['contact_phone']) ? ''   : $instance['contact_phone'];
        
        $map		= !isset($instance['contact_map']) ? ''      : $instance['contact_map'];
        
 
        ?>
			<?php echo $before_widget; ?>
				
				<div class="vcard">
					<?php if (!empty($instance['contact_title']))
						echo $before_title . apply_filters('widget_title', $instance['contact_title']) . $after_title; ?>
					<ul class="address">
					
						<?php if($name) echo '<li class="fn">'.$name.'</li>'; ?>
						<?php if($street) echo '<li class="adr">'.$street.'</li>'; ?>
						<?php if($address2) echo '<li>'.$address2.'</li>'; ?>
						<?php if($city) echo '<li class="locality">'.$city.'</li>'; ?>
						<?php if($phone) echo '<li class="tel">'.$phone.'</li>'; ?>
					</ul>
					
					<?php if($open) echo '<h3 class="widget-title">'.$open.':</h3>'; ?>
					
					<ul class="times">
						<?php if($times1) echo '<li class="hours">'.$times1.'</li>'; ?>
		
						<?php if($times2) echo '<li class="hours">'.$times2.'</li>'; ?>
					
						<?php if($times3) echo '<li class="hours">'.$times3.'</li>'; ?>
			
						<?php if($times4) echo '<li class="hours">'.$times4.'</li>'; ?>
				
						<?php if($times5) echo '<li class="hours">'.$times5.'</li>'; ?>
					</ul>
 				</div><!-- .vcard -->
 				
 				<?php if($map) echo '<div class="contact-map">'.$map.'</div><!-- .contact-map -->'; ?>
	 				
			<?php echo $after_widget; ?>
        <?php
    }

    public function update($new_instance, $old_instance) {  
    	
    	$instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags($new_instance['title']) : '';
    	$instance['open'] = ! empty( $new_instance['open'] ) ? strip_tags($new_instance['open']) : '';
    	$instance['contact_name'] = strip_tags($new_instance['contact_name']);
    	$instance['contact_times1'] = strip_tags($new_instance['contact_times1']);
    	$instance['contact_times2'] = strip_tags($new_instance['contact_times2']);
    	$instance['contact_times3'] = strip_tags($new_instance['contact_times3']);
    	
    	$instance['contact_times4'] = strip_tags($new_instance['contact_times4']);
    	
    	$instance['contact_times5'] = strip_tags($new_instance['contact_times5']);
    	$instance['contact_phone'] = strip_tags($new_instance['contact_phone']);
    	
    	$instance['contact_number'] = ! empty( $new_instance['contact_number'] ) ? strip_tags($new_instance['contact_number']) : '';
    	$instance['contact_street'] = strip_tags($new_instance['contact_street']);
    	$instance['contact_address2'] = strip_tags($new_instance['contact_address2']);
    	$instance['contact_city'] = strip_tags($new_instance['contact_city']);
    	$instance['contact_map'] = stripslashes($new_instance['contact_map']);
                  
        return $new_instance;
    }
 
    public function form($instance) {
        
		$instance	= wp_parse_args( (array) $instance, array( 
			'title' => '', 
			'contact_name' => '',
			'open' =>'', 
			'contact_times1' => '', 
			'contact_times2' => '', 
			'contact_times3' => '', 
			'contact_times4' => '',
			'contact_times5' => '',
			'contact_number' => '', 
			'contact_street' => '', 
			'contact_phone' => '', 
			'contact_city' => '' ) 
		);
		$title 			= ! empty( $instance['contact_title'] ) ? strip_tags($instance['contact_title']) : '';
		$name 			= ! empty( $instance['contact_name'] ) ? strip_tags($instance['contact_name']) : '';
		$open			= ! empty( $instance['contact_open'] ) ? strip_tags($instance['contact_open']) : '';
		$times1			= ! empty( $instance['contact_times1'] ) ? strip_tags($instance['contact_times1']) : '';
		$times2			= ! empty( $instance['contact_times2'] ) ? strip_tags($instance['contact_times2']) : '';
		$times3			= ! empty( $instance['contact_times3'] ) ? strip_tags($instance['contact_times3']) : '';
		
		
		$times4			= strip_tags($instance['contact_times4']);
		
		$times5			= strip_tags($instance['contact_times5']);
		$contact_phone	= strip_tags($instance['contact_phone']);
		
		$number			= strip_tags($instance['contact_number']);
		$street			= strip_tags($instance['contact_street']);
		$address2		= ! empty( $instance['contact_address2'] ) ? strip_tags($instance['contact_address2']) : '';
		$city 			= strip_tags($instance['contact_city']);
		$map 			= ! empty( $instance['contact_map'] ) ? stripslashes($instance['contact_map']) : '';
?>
	
		<h3 style=""><?php _e('Widget Instructions:','grassroots'); ?></h3>
			<p>
				<?php _e('This widget allows you to create a contact box with your address, open hours and map.  All the information is optional.  Only fields that have information in them will be displayed.','grassroots'); ?>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('contact_title'); ?>"><?php _e('Title','grassroots'); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id('contact_title'); ?>" name="<?php echo $this->get_field_name('contact_title'); ?>" type="text" value="<?php echo  esc_attr($title); ?>" />
				</label>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('contact_name'); ?>"><?php _e('Name','grassroots'); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id('contact_name'); ?>" name="<?php echo $this->get_field_name('contact_name'); ?>" type="text" value="<?php echo  esc_attr($name); ?>" />
				</label>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('contact_street'); ?>"><?php _e('Address','grassroots'); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id('contact_street'); ?>" name="<?php echo $this->get_field_name('contact_street'); ?>" type="text" value="<?php echo  esc_attr($street); ?>" />
				</label>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('contact_address2'); ?>"><?php _e('Address 2','grassroots'); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id('contact_address2'); ?>" name="<?php echo $this->get_field_name('contact_address2'); ?>" type="text" value="<?php echo  esc_attr($address2); ?>" />
				</label>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('contact_city'); ?>"><?php _e('City, State ZIP','grassroots'); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id('contact_city'); ?>" name="<?php echo $this->get_field_name('contact_city'); ?>" type="text" value="<?php echo  esc_attr($city); ?>" />
				</label>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('contact_phone'); ?>"><?php _e('Phone Number','grassroots'); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id('contact_phone'); ?>" name="<?php echo $this->get_field_name('contact_phone'); ?>" type="text" value="<?php echo  esc_attr($contact_phone); ?>" />
				</label>
			</p>
			
			<p>
				<?php _e('For the map, you will want to paste an embeddable map from a service like Google Maps.  For best results, size your map to be 600 pixels wide by 450 pixels tall.','grassroots'); ?>
			</p>

		<p>
			<label for="<?php echo $this->get_field_id('contact_open'); ?>"><?php _e('Hours Title','grassroots'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('contact_open'); ?>" name="<?php echo $this->get_field_name('contact_open'); ?>" type="text" value="<?php echo  esc_attr($open); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('contact_times1'); ?>"><?php _e('Time 1','grassroots'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('contact_times1'); ?>" name="<?php echo $this->get_field_name('contact_times1'); ?>" type="text" value="<?php echo  esc_attr($times1); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('contact_times2'); ?>"><?php _e('Time 2','grassroots'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('contact_times2'); ?>" name="<?php echo $this->get_field_name('contact_times2'); ?>" type="text" value="<?php echo  esc_attr($times2); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('contact_times3'); ?>"><?php _e('Time 3','grassroots'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('contact_times3'); ?>" name="<?php echo $this->get_field_name('contact_times3'); ?>" type="text" value="<?php echo  esc_attr($times3); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('contact_times4'); ?>"><?php _e('Time 4','grassroots'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('contact_times4'); ?>" name="<?php echo $this->get_field_name('contact_times4'); ?>" type="text" value="<?php echo  esc_attr($times4); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('contact_times5'); ?>"><?php _e('Time 5','grassroots'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('contact_times5'); ?>" name="<?php echo $this->get_field_name('contact_times5'); ?>" type="text" value="<?php echo  esc_attr($times5); ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('contact_map'); ?>"><?php _e('Map','grassroots'); ?>:
			<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('contact_map'); ?>" name="<?php echo $this->get_field_name('contact_map'); ?>"><?php echo esc_attr($map); ?></textarea>
			</label>	
		</p>
		
<?php
	}

}
 


function OrganizedThemes_Contact_Init() {
	register_widget('OrganizedThemes_Contact');
}
add_action('widgets_init', 'OrganizedThemes_Contact_Init');
