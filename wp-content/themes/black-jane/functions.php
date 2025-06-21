<?php

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('blackjane_enqueue_scripts')) {

	function blackjane_enqueue_scripts() {

		wp_deregister_style ( 'suevafree-style' );
		wp_deregister_style ( 'suevafree-header_layout_1');
		wp_deregister_style ( 'suevafree_google_fonts' );

		wp_enqueue_style( 'blackjane_template' , get_stylesheet_directory_uri() . '/assets/css/template.css' ); 
		wp_enqueue_script( 'blackjane_template', get_stylesheet_directory_uri() . '/assets/js/jquery.functions.js' , array('jquery'), FALSE, TRUE );

		if ( !suevafree_setting( 'blackjane_header_layout') || suevafree_setting( 'blackjane_header_layout') == 'blackjane_header_layout' ) {
		
			wp_enqueue_style ( 'blackjane_header_layout', get_stylesheet_directory_uri() . '/assets/css/header-layout.css' );

		} else {
		
			$header_layout = str_replace('suevafree_', '', suevafree_setting( 'blackjane_header_layout'));
			wp_enqueue_style( 'suevafree-' . $header_layout , get_template_directory_uri() . '/assets/css/header/' . $header_layout . '.css' );
		
		}

		if ( !get_theme_mod('suevafree_skin') ) {
			
			wp_enqueue_style( 'blackjane_orange' , get_template_directory_uri() . '/assets/skins/orange.css' ); 

		} elseif ( get_theme_mod('suevafree_skin') ) { 
		
			wp_deregister_style( 'suevafree-' . get_theme_mod('suevafree_skin')); 
			wp_enqueue_style( 'blackjane_' . get_theme_mod('suevafree_skin') , get_template_directory_uri() . '/assets/skins/' . get_theme_mod('suevafree_skin') . '.css' ); 
		
		}
		
		$fonts_args = array(
			'family' =>	str_replace('|', '%7C','Mukta+Vaani:300,300i,400,400i,500,500i,600,600i,700,700i|Courgette'),
			'subset' =>	'latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic'
		);

		wp_enqueue_style ( 'slick', get_stylesheet_directory_uri() . '/assets/css/slick.css' );
		wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/assets/js/slick.js' , array('jquery'), FALSE, TRUE );
		wp_enqueue_style( 'blackjane_google_fonts', add_query_arg ($fonts_args, "https://fonts.googleapis.com/css" ), array(), null);
	
	}
	
	add_action( 'wp_enqueue_scripts', 'blackjane_enqueue_scripts', 99 );

}

/*-----------------------------------------------------------------------------------*/
/* CUSTOMIZE */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('blackjane_customize_register')) {

	function blackjane_customize_register( $wp_customize ) {

		$wp_customize->remove_setting( 'suevafree_header_layout');
		$wp_customize->remove_control( 'suevafree_header_layout');
		
		$wp_customize->add_section( 'blackjane_slick_layout_section' , array(
			'title'    => esc_html__('Black Jane Slick Slideshow','black-jane'),
			'priority' => 9
		));   
	
		$wp_customize->add_setting( 'blackjane_slick_layout', array(
			'default' => 'on',
			'sanitize_callback' => 'blackjane_select_sanitize',
		));

		$wp_customize->add_control( 'blackjane_slick_layout' , array(
									
			'type' => 'select',
			'section' => 'blackjane_slick_layout_section',
			'priority' => 1,
			'label' => esc_html__('Black Jane Slick Slideshow','black-jane'),
			'description' => esc_html__('Do you want to display the Slick Slideshow?','black-jane'),
			'choices'  => array (
				'off' => esc_html__( 'No',   'black-jane'),
				'on' => esc_html__( 'Yes',   'black-jane'),
			),
												
		));

		$wp_customize->add_setting( 'blackjane_slick_limit', array(
			'default' => '5',
			'sanitize_callback' => 'blackjane_limit_sanitize',
		));

		$wp_customize->add_control( 'blackjane_slick_limit' , array(
									
			'type' => 'text',
			'section' => 'blackjane_slick_layout_section',
			'priority' => 1,
			'label' => esc_html__('Limit','black-jane'),
			'description' => esc_html__('How many items you want to display? (set -1 to load all items)','black-jane'),
												
		));

		$wp_customize->add_setting( 'blackjane_slick_overlay', array(
			'default' => 'on',
			'sanitize_callback' => 'blackjane_select_sanitize',
		));

		$wp_customize->add_control( 'blackjane_slick_overlay' , array(
									
			'type' => 'select',
			'section' => 'blackjane_slick_layout_section',
			'priority' => 1,
			'label' => esc_html__('Caption Overlay','black-jane'),
			'description' => esc_html__('Do you want to display the caption overlay on Slick Slideshow?','black-jane'),
			'choices'  => array (
				'off' => esc_html__( 'No',   'black-jane'),
				'on' => esc_html__( 'Yes',   'black-jane'),
			),
												
		));

		$wp_customize->add_setting( 'blackjane_header_layout', array(
			'default' => 'blackjane_header_layout',
			'sanitize_callback' => 'blackjane_select_sanitize',
		));

		$wp_customize->add_control( 'blackjane_header_layout' , array(
									
			'type' => 'select',
			'section' => 'layouts_section',
			'priority' => 1,
			'label' => esc_html__('Header Layout','black-jane'),
			'description' => esc_html__('Header Layout','black-jane'),
			'choices'  => array (
				'blackjane_header_layout' => esc_html__( 'Black Jane Header Layout',   'black-jane'),
				'suevafree_header_layout_1' => esc_html__( 'SuevaFree Header Layout 1', 'black-jane'),
				'suevafree_header_layout_2' => esc_html__( 'SuevaFree Header Layout 2', 'black-jane'),
				'suevafree_header_layout_3' => esc_html__( 'SuevaFree Header Layout 3', 'black-jane'),
				'suevafree_header_layout_4' => esc_html__( 'SuevaFree Header Layout 4', 'black-jane'),
				'suevafree_header_layout_5' => esc_html__( 'SuevaFree Header Layout 5', 'black-jane'),
			),
												
		));

		function blackjane_limit_sanitize ($value, $setting) {
		
			if ( is_numeric($value) ) {
					
				return absint($value);
					
			} else {
					
				return $setting->default;
					
			}
			
		}

		function blackjane_select_sanitize ($value, $setting) {
		
			global $wp_customize;
					
			$control = $wp_customize->get_control( $setting->id );
				 
			if ( array_key_exists( $value, $control->choices ) ) {
					
				return $value;
					
			} else {
					
				return $setting->default;
					
			}
			
		}

	}
	
	add_action( 'customize_register', 'blackjane_customize_register', 11 );

}

/*-----------------------------------------------------------------------------------*/
/* HEADER SIDEBAR REPLACE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('blackjane_header_sidebar_replace')) {

	function blackjane_header_sidebar_replace() {

		remove_action( 'suevafree_header_sidebar', 'suevafree_header_sidebar_function', 10, 2 );
	}
	
	add_action('init','blackjane_header_sidebar_replace');

}

/*-----------------------------------------------------------------------------------*/
/* JANEPRO HEADER SIDEBAR */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('blackjane_header_sidebar_function')) {
	
	function blackjane_header_sidebar_function($name) {

		if ( suevafree_setting('blackjane_slick_layout', 'on') === 'on' && ( is_home() || is_front_page()) ) 
			do_action('blackjane_slick_slider');

		if ( is_active_sidebar($name) ) : ?>
			
			<div id="header_sidebar" class="container sidebar-area">
			
				<div class="row">
				
					<div class="col-md-12">
						
						<?php dynamic_sidebar($name) ?>
												
					</div>
	
				</div>
				
			</div>
				
<?php 
	
		endif;
		
	}

	add_action( 'suevafree_header_sidebar', 'blackjane_header_sidebar_function', 10, 2 );

}

/*-----------------------------------------------------------------------------------*/
/* JANEPRO THEME DEFAULT VALUES */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('blackjane_theme_setup')) {

	function blackjane_theme_setup() {

		add_image_size( 'blackjane_slick', 1170, 600, TRUE ); 
		
		load_child_theme_textdomain( 'black-jane', get_stylesheet_directory() . '/languages' );
		
		require_once( trailingslashit( get_stylesheet_directory() ) . 'template-part/slick-slider.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'template-part/header-layout.php' );

		if ( !suevafree_setting('suevafree_thumb_triangle') )
			set_theme_mod( 'suevafree_thumb_triangle', 'on' );
			
		if ( !suevafree_setting('suevafree_thumb_hover') )
			set_theme_mod( 'suevafree_thumb_hover', 'on' );
			
		if ( !suevafree_setting('suevafree_disable_box_shadow') )
			set_theme_mod( 'suevafree_disable_box_shadow', 'on' );

		if ( !suevafree_setting('suevafree_post_format_layout') )
			set_theme_mod( 'suevafree_post_format_layout', 'on' );

		if ( !suevafree_setting('suevafree_post_details_layout') )
			set_theme_mod( 'suevafree_post_details_layout', 'suevafree_before_content_2' );

		if ( !suevafree_setting('suevafree_page_details_layout') )
			set_theme_mod( 'suevafree_page_details_layout', 'suevafree_before_content_3' );

		if ( !suevafree_setting('suevafree_sidebar_layout') )
			set_theme_mod( 'suevafree_sidebar_layout', 'sneak' );

		if ( !suevafree_setting('suevafree_footer_layout') )
			set_theme_mod( 'suevafree_footer_layout', 'footer_layout_3' );

		if ( !suevafree_setting('suevafree_logo_font_size') )
			set_theme_mod( 'suevafree_logo_font_size', '60px' );

		if ( !suevafree_setting('suevafree_menu_font_size') )
			set_theme_mod( 'suevafree_menu_font_size', '13px' );

		if ( !suevafree_setting('suevafree_menu_font_weight') )
			set_theme_mod( 'suevafree_menu_font_weight', '600' );

	}

	add_action( 'after_setup_theme', 'blackjane_theme_setup' );

}

?>