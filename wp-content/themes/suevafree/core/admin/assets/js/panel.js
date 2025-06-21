jQuery.noConflict()(function($){

	"use strict";

/* ===============================================
   ColorPicker
   =============================================== */

	$('.suevafree_color_picker').wpColorPicker();

/* ===============================================
   On off
   =============================================== */

	$('.on-off').on("change",function() {
		
		if ($(this).val() === "on" ) { 
			$('.hidden-element').css({'display':'none'});
		} 
		else { 
			$('.hidden-element').slideDown("slow");
		} 
	
	}); 

	$('input[type="checkbox"].on_off').on("change",function() { 
	
		if (!this.checked) { 
			$(this).parent('.iPhoneCheckContainer').parent('.suevafree_inputbox').next('.hidden-element').slideUp("slow");
		} else { 
			$(this).parent('.iPhoneCheckContainer').parent('.suevafree_inputbox').next('.hidden-element').slideDown("slow");
		} 
	
	}); 
	
/* ===============================================
   Upload media
   =============================================== */

	$('.suevafree_inputbox input.upload_button').on("click", function(e) {

		var custom_uploader;
		var attachmentId = "";

		attachmentId = $(this).prev('.upload_attachment').attr("id");
		
		e.preventDefault();

		if (custom_uploader) {
			custom_uploader.open(this);
			return;
		}

		custom_uploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			},
			multiple: false
		});

		custom_uploader.on('select', function() {
			
			var attachment = custom_uploader.state().get('selection').first().toJSON();
			$('input#' + attachmentId ).val(attachment.url);
		
		});

		custom_uploader.open();

});

/* ===============================================
   Tabs
   =============================================== */

	$( "#tabs.suevafree_metaboxes" ).tabs();

/* ===============================================
   Changelog
   =============================================== */

    $('.changelog_container .theme_version').last().css('border-bottom', 'none', 'border-top', 'none');
	
    $('.changelog_container .theme_version').click(function() {
        if ($(this).next('.changelog_details').css('display') === 'none') {
            $(this).addClass('inactive');
            $(this).children('.dashicons').removeClass('dashicons-arrow-down-alt2').addClass('dashicons-arrow-up-alt2');
        } else {
            $(this).removeClass('inactive');
            $(this).children('.dashicons').removeClass('dashicons-arrow-up-alt2').addClass('dashicons-arrow-down-alt2');
        }
        $(this).next('.changelog_details').stop(true, false).slideToggle('slow');
    });

});