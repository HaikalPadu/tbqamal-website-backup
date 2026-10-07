// Upload Background Image
	var file_frame;
	 
	jQuery(document).on('click', '#homebox-image-upload', function( event ){
		event.preventDefault();
	 
		if ( file_frame ) {
			file_frame.open();
			return;
		}
	 
		file_frame = wp.media.frames.file_frame = wp.media({
		
			title: jQuery( this ).data( 'Choose An Image' ),
			button: {
				text: jQuery( this ).data( 'uploader_button_text' ),
			},
			library : { type : 'image' },
			multiple: false  
		
		});
	 
	    file_frame.on( 'select', function() {
	      
			attachment = file_frame.state().get('selection').first().toJSON();
			
			jQuery('.image_url').val(attachment.url);
	      
	    });
	
	    file_frame.open();
	    
	});