<?php

global $am_option;

if (!is_admin()){
	add_action( 'wp_enqueue_scripts', 'am_add_javascript' );
	add_action('wp_print_styles', 'am_add_css');
}

load_theme_textdomain( $am_option['textdomain'], get_template_directory() . '/languages' );

add_filter('body_class','am_browser_body_class');
add_filter('excerpt_more', 'am_excerpt_more');
add_action('widgets_init', 'am_the_widgets_init' );
add_action('widgets_init', 'am_unregister_default_wp_widgets', 1);
add_filter('the_title','am_has_title');
add_filter('the_content', 'am_texturize_shortcode_before' );
add_action( 'login_headerurl', 'am_login_logo_url' );
add_filter( 'comment_form_fields', 'am_move_comment_field_to_bottom' );
add_filter('upload_mimes', 'am_mime_types');
add_action('admin_head', 'am_svg_thumb_display');

// create demo user which can not install plugins and themes
add_action('init', 'am_demo_role');

//acf plugin
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
        'position' => 59
	));
	
	/*acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Socials Settings',
		'menu_title'	=> 'Socials',
		'parent_slug'	=> 'theme-general-settings',
	));*/
	
}

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'mainmenu' => __( 'Main Navigation', 'am' ),
	'footermenu' => __( 'Footer Navigation', 'am' ),
) );

// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );

add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support('title-tag');

// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// Allow Shortcodes in Sidebar Widgets
add_filter('widget_text', 'do_shortcode');

//remove_filter( 'the_content', 'wpautop' );
//add_filter( 'the_content', 'wpautop' , 99);
//add_filter( 'the_content', 'shortcode_unautop',100 );

// Image Sizes
add_image_size('slide-image', 1209, 665, true);
add_image_size('offer-image', 585, 730, true);
add_image_size('offer-image-2x', 1170, 1460, true);
add_image_size('room-slider-big', 1260, 650, true);
add_image_size('room-slider-big-2x', 2520, 1300, true);
add_image_size('people-slider', 465, 600, true);
add_image_size('people-slider-2x', 930, 1200, true);
add_image_size( 'room-options-card', 555, 728, true );
add_image_size( 'room-options-card-2x', 1110, 1456, true );
add_image_size( 'culinary-hero', 720, 895, true );
add_image_size( 'culinary-hero-2x', 1440, 1790, true );
add_image_size( 'culinary-detail', 630, 840, true );
add_image_size( 'culinary-detail-2x', 1260, 1680, true );
add_image_size( 'culinary-form', 720, 960, true );
add_image_size( 'culinary-form-2x', 1440, 1920, true );
add_image_size( 'venues', 585, 730, true );
add_image_size( 'venues-2x', 1170, 1460, true );
add_image_size( 'wedding-hero', 720, 895, true );
add_image_size( 'wedding-hero-2x', 1440, 1790, true );
add_image_size( 'two-columns-image', 710, 640, true );
add_image_size( 'two-columns-image-2x', 1420, 1280, true );
add_image_size( 'loop-press', 400, 560, true );
add_image_size( 'loop-press-2x', 800, 1320, true );
add_image_size( 'media-content-intro', 490, 640, true );
add_image_size( 'media-content-intro-2x', 980, 1280, true );
add_image_size( 'media-content-room', 645, 890, true );
add_image_size( 'media-content-room-2x', 1290, 1780, true );
add_image_size( 'media-content-dine', 600, 780, true );
add_image_size( 'media-content-dine-2x', 1200, 1560, true );
//show_admin_bar(false);
//define( 'WPCF7_AUTOP', false );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function am_content_width() {
    $GLOBALS['content_width'] = apply_filters('wfc_content_width', 960);
}

add_action('after_setup_theme', 'am_content_width', 0);