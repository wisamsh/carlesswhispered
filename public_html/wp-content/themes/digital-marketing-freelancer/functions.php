<?php
/**
 * Digital Marketing Freelancer functions and definitions
 *
 * @package Digital Marketing Freelancer
 * @since 1.0
 */

if ( ! function_exists( 'digital_marketing_freelancer_support' ) ) :
	function digital_marketing_freelancer_support() {

		load_theme_textdomain( 'digital-marketing-freelancer', get_template_directory() . '/languages' );

		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'digital_marketing_freelancer_custom_background', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
		
		add_theme_support( 'wp-block-styles' );

		add_editor_style( 'style.css' );

		define('DIGITAL_MARKETING_FREELANCER_BUY_NOW',__('https://www.themescarts.com/products/freelancer-wordpress-theme/','digital-marketing-freelancer'));
		define('DIGITAL_MARKETING_FREELANCER_FOOTER_BUY_NOW',__('https://www.themescarts.com/products/free-digital-marketing-wordpress-theme/','digital-marketing-freelancer'));

	}
endif;
add_action( 'after_setup_theme', 'digital_marketing_freelancer_support' );

/*-------------------------------------------------------------
 Enqueue Styles
--------------------------------------------------------------*/

if ( ! function_exists( 'digital_marketing_freelancer_styles' ) ) :
	function digital_marketing_freelancer_styles() {
		// Register theme stylesheet.
		wp_enqueue_style('digital-marketing-freelancer-style', get_stylesheet_uri(), array(), wp_get_theme()->get('version') );
		wp_enqueue_style('digital-marketing-freelancer-style-blocks', get_template_directory_uri(). '/assets/css/blocks.css');
		wp_enqueue_style('digital-marketing-freelancer-style-responsive', get_template_directory_uri(). '/assets/css/responsive.css');
		wp_style_add_data( 'digital-marketing-freelancer-basic-style', 'rtl', 'replace' );

		//animation
		wp_enqueue_script( 'wow-js', get_theme_file_uri( '/assets/js/wow.js' ), array( 'jquery' ), true );
		
		wp_enqueue_style( 'animate-css', get_template_directory_uri().'/assets/css/animate.css' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'digital_marketing_freelancer_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
require_once get_theme_file_path( 'inc/digital-marketing-freelancer-theme-info-page/templates/class-theme-notice.php' );
require_once get_theme_file_path( 'inc/digital-marketing-freelancer-theme-info-page/class-theme-info.php' );

require_once get_theme_file_path( '/inc/customizer.php' );

?>