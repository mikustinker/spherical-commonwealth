<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Ben_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function theme_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'theme_body_classes' );

// Register options page for ACF field
if( function_exists('acf_add_options_page') ) {
	
    acf_add_options_page(array(
      'page_title' 	=> 'Theme General Settings',
      'menu_title'	=> 'Theme Settings',
      'menu_slug' 	=> 'theme-general-settings',
      'capability'	=> 'edit_posts',
      'redirect'		=> false
    ));
}

//Styling login form
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/css/style-login.css' );
    // wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


// disable for post types
// add_filter('use_block_editor_for_post_type', '__return_false', 10);
// add_action('init', 'my_remove_editor_from_post_type');
// function my_remove_editor_from_post_type() {
// 	remove_post_type_support( 'page', 'editor' );
// }

//add categories and tages for pages
function add_categories_to_pages() {
	register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );

add_post_type_support( 'page', 'excerpt' );

/**
 * Function that will automatically update ACF field groups via JSON file update.
 * 
 * @link http://www.advancedcustomfields.com/resources/synchronized-json/
 */
// function jp_sync_acf_fields() {

// 	// vars
// 	$groups = acf_get_field_groups();
// 	$sync 	= array();

// 	// bail early if no field groups
// 	if( empty( $groups ) )
// 		return;

// 	// find JSON field groups which have not yet been imported
// 	foreach( $groups as $group ) {
		
// 		// vars
// 		$local 		= acf_maybe_get( $group, 'local', false );
// 		$modified 	= acf_maybe_get( $group, 'modified', 0 );
// 		$private 	= acf_maybe_get( $group, 'private', false );

// 		// ignore DB / PHP / private field groups
// 		if( $local !== 'json' || $private ) {
			
// 			// do nothing
			
// 		} elseif( ! $group[ 'ID' ] ) {
			
// 			$sync[ $group[ 'key' ] ] = $group;
			
// 		} elseif( $modified && $modified > get_post_modified_time( 'U', true, $group[ 'ID' ], true ) ) {
			
// 			$sync[ $group[ 'key' ] ]  = $group;
// 		}
// 	}

// 	// bail if no sync needed
// 	if( empty( $sync ) )
// 		return;

// 	if( ! empty( $sync ) ) { //if( ! empty( $keys ) ) {
		
// 		// vars
// 		$new_ids = array();
		
// 		foreach( $sync as $key => $v ) { //foreach( $keys as $key ) {
			
// 			// append fields
// 			if( acf_have_local_fields( $key ) ) {
				
// 				$sync[ $key ][ 'fields' ] = acf_get_local_fields( $key );
				
// 			}

// 			// import
// 			$field_group = acf_import_field_group( $sync[ $key ] );
// 		}
// 	}

// }
// add_action( 'admin_init', 'jp_sync_acf_fields' );

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
    acf_update_setting('show_updates', true);
    acf_update_setting('google_api_key', 'AIzaSyAjfAop9QmH-YB6KCoaAeckYx0PMmJaI3k');
}

//Saving points
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    
    
    // return
    return $path;
    
}
//Loading points
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';
    
    
    // return
    return $paths;
    
}

//** *Enable upload for webp image files.*/
function webp_upload_mimes($existing_mimes) {
	$existing_mimes['webp'] = 'image/webp';
	return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');

//Wp ajax init
add_action( 'wp_head', 'my_wp_ajaxurl' );
function my_wp_ajaxurl() {
	$url = parse_url( home_url( ) );
	if( $url['scheme'] == 'https' ){
	   $protocol = 'https';
	}        
	else{
	    $protocol = 'http';
	}
    ?>
    <?php global $wp_query; ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url( 'admin-ajax.php', $protocol ); ?>';
    </script>
    <?php
}
/* Disable WordPress Admin Bar for all users */
// add_filter( 'show_admin_bar', '__return_false' );

// Add Body Class
add_filter( 'body_class', 'custom_acf_body_class' );
function custom_acf_body_class( $classes ) {
	if ( $body_class = get_field( 'body_class', get_queried_object_id() ) ) {
		$body_class = esc_attr( trim( $body_class ) );
		$classes[] = $body_class;
	}
	if( get_field( 'lightbox_theme', 'options' ) ) {
		$classes[] = 'lightbox--dark';
	}
	return $classes;
}

// Button shortcode
function cta_link_func( $atts ) {
	$a = shortcode_atts( array(
		'href' => '#',
		'title' => '',
		'class' => '',
        'target'=> '',
        'download' => ''
	), $atts );
    if ($a['download']) : 
        $path_parts = pathinfo($a['href']);
        $download = 'download="' . $path_parts['basename'] . '"';
    endif; 
	return '<a  href="' . $a['href'] . '" 
                    class="' . $a['class'] . '" 
                    target="' . $a['target'] . '" ' . $download . '>' . $a['title'] .'</a>';
}
add_shortcode( 'cta_link', 'cta_link_func' );

// Contact US shortcode
function contact_module_func( $atts ) {
	$a = shortcode_atts( array(
		'href' => '#',
		'title' => '',
		'target' => '',
		'href1' => '#',
		'title1' => '',
		'target1' => ''
	), $atts );
	ob_start(); ?>
	<div class="contact-shortcode"> 
	<?php if( $a['title'] ) : ?>
        <a href="<?php echo $a['href']; ?>" target="<?php echo $a['target']; ?>" class="direct-link">
			<?php echo $a['title']; ?>
		</a>
    <?php endif; ?>
	<?php if( $a['title'] && $a['title1'] ): ?>
		<span class="separator"></span>
	<?php endif; ?>
	<?php if( $a['title1'] ) : ?>
        <a href="<?php echo $a['href1']; ?>" target="<?php echo $a['target1']; ?>" class="contact-link">
			<?php echo $a['title1']; ?>
		</a>
    <?php endif; ?>
	</div>
	<?php 
	return ob_get_clean();
}
add_shortcode( 'contact_module', 'contact_module_func' );

// Ajax Amentities
add_action('wp_ajax_loadAjaxAmentities', 'loadAjaxAmentities_handler');
add_action('wp_ajax_nopriv_loadAjaxAmentities', 'loadAjaxAmentities_handler');

function loadAjaxAmentities_handler() {
	$id = $_POST['id'];
    $res->output = get_field( 'amentites', $id );
	echo json_encode($res);
	die;
}

// Add image column in media library
add_filter( 'manage_media_columns', 'sk_media_columns_filesize' );
/**
 * Filter the Media list table columns to add a File Size column.
 *
 * @param array $posts_columns Existing array of columns displayed in the Media list table.
 * @return array Amended array of columns to be displayed in the Media list table.
 */
function sk_media_columns_filesize( $posts_columns ) {
    $posts_columns['filesize'] = __( 'File Size', 'my-theme-text-domain' );

    return $posts_columns;
}

add_action( 'manage_media_custom_column', 'sk_media_custom_column_filesize', 10, 2 );
/**
 * Display File Size custom column in the Media list table.
 *
 * @param string $column_name Name of the custom column.
 * @param int    $post_id Current Attachment ID.
 */
function sk_media_custom_column_filesize( $column_name, $post_id ) {
    if ( 'filesize' !== $column_name ) {
        return;
    }

    $bytes = filesize( get_attached_file( $post_id ) );

    echo size_format( $bytes, 2 );
}

add_action( 'admin_print_styles-upload.php', 'sk_filesize_column_filesize' );
/**
 * Adjust File Size column on Media Library page in WP admin
 */
function sk_filesize_column_filesize() {
    echo
    '<style>
        .fixed .column-filesize {
            width: 10%;
        }
    </style>';
}

/**
 * Like get_template_part() put lets you pass args to the template file
 * Args are available in the tempalte as $template_args array
 * @param string filepart
 * @param mixed wp_args style argument list
 * https://wordpress.stackexchange.com/questions/176804/passing-a-variable-to-get-template-part
 */
function get_template_part_args( $file, $template_args = array(), $cache_args = array() ) {
    $template_args = wp_parse_args( $template_args );
    $cache_args = wp_parse_args( $cache_args );
    if ( $cache_args ) {
        foreach ( $template_args as $key => $value ) {
            if ( is_scalar( $value ) || is_array( $value ) ) {
                $cache_args[$key] = $value;
            } else if ( is_object( $value ) && method_exists( $value, 'get_id' ) ) {
                $cache_args[$key] = call_user_method( 'get_id', $value );
            }
        }
        if ( ( $cache = wp_cache_get( $file, serialize( $cache_args ) ) ) !== false ) {
            if ( ! empty( $template_args['return'] ) )
                return $cache;
            echo $cache;
            return;
        }
    }
    $file_handle = $file;
    do_action( 'start_operation', 'hm_template_part::' . $file_handle );
    if ( file_exists( get_stylesheet_directory() . '/' . $file . '.php' ) )
        $file = get_stylesheet_directory() . '/' . $file . '.php';
    elseif ( file_exists( get_template_directory() . '/' . $file . '.php' ) )
        $file = get_template_directory() . '/' . $file . '.php';
    ob_start();
    $return = require( $file );
    $data = ob_get_clean();
    do_action( 'end_operation', 'hm_template_part::' . $file_handle );
    if ( $cache_args ) {
        wp_cache_set( $file, $data, serialize( $cache_args ), 3600 );
    }
    if ( ! empty( $template_args['return'] ) )
        if ( $return === false )
            return false;
        else
            return $data;
    echo $data;
}


// Ajax Press
add_action('wp_ajax_loadAjaxPress', 'loadAjaxPress_handler');
add_action('wp_ajax_nopriv_loadAjaxPress', 'loadAjaxPress_handler');

function loadAjaxPress_handler() {
    $page = $_POST['page'] ? (int)$_POST['page'] : 0;
	if( $_POST['category'] ):
		$tax_query = array(
			array( 
				'taxonomy' => 'press_category',
				'field' => 'slug',
				'terms' => $_POST['category']
			));
	endif;
	$args = array(
		'post_type' => 'press',
		'post_status' => 'publish',
		'tax_query' => $tax_query,
		'paged' => $page + 1,
		'number' => 6
	);
	if( !empty($_POST['category']) && $page > 0 ) {
		$args['offset'] = 3 + $page * 6;
	} 
	if( empty($_POST['category']) && $page == 0 ) {
		$args['number'] = '';
		$args['posts_per_page'] = 9;
	}
	$query = new WP_Query( $args );
	if( $query->have_posts( ) ):
		ob_start(); 
		while( $query->have_posts( ) ): $query->the_post( ); 
			get_template_part( 'templates/loop', 'press' );
		endwhile;
	else: ?>
	<div class="no-results">No press found.</div>
	<?php endif;
	wp_reset_query(  );
	$res->output = ob_get_clean();
	
    $res->has_more_pages = false;
    if ($query->max_num_pages > ( $page + 1 )) {
        $res->page = $page + 1;
        $res->has_more_pages = true;
    }
	
	echo json_encode($res);
	die;
}

// Ajax Offers
add_action('wp_ajax_loadAjaxOffers', 'loadAjaxOffers_handler');
add_action('wp_ajax_nopriv_loadAjaxOffers', 'loadAjaxOffers_handler');

function loadAjaxOffers_handler() {
    $page = $_POST['page'] ? (int)$_POST['page'] : 0;
	if( $_POST['category'] ):
		$tax_query = array(
			array( 
				'taxonomy' => 'offer_category',
				'field' => 'slug',
				'terms' => $_POST['category']
			));
	endif;
	$args = array(
		'post_type' => 'offer',
		'post_status' => 'publish',
		'tax_query' => $tax_query,
		'posts_per_page' => 2,
		'paged' => $page + 1
	);
	$query = new WP_Query( $args );
	if( $query->have_posts( ) ): 
		ob_start(); 
		while( $query->have_posts( ) ): $query->the_post( ); 
			get_template_part( 'templates/loop', 'offer', array( 'post' => get_the_ID(), 'show_more' => true ) );
		endwhile;
	else: ?>
		<div class="no-offer">No offers found.</div>
	<?php endif;

	wp_reset_query(  );
	$res->output = ob_get_clean();

    $res->has_more_pages = false;
    if ($query->max_num_pages > ( $page + 1 )) {
        $res->page = $page + 1;
        $res->has_more_pages = true;
    }

	echo json_encode($res);
	die;
}


// Ajax Venuues
add_action('wp_ajax_loadAjaxVenues', 'loadAjaxVenues_handler');
add_action('wp_ajax_nopriv_loadAjaxVenues', 'loadAjaxVenues_handler');

function loadAjaxVenues_handler() {
	if( $_POST['category'] ):
		$tax_query = array(
			array( 
				'taxonomy' => 'venue_category',
				'field' => 'slug',
				'terms' => $_POST['category']
			));
	endif;
	$args = array(
		'post_type' => 'venue',
		'post_status' => 'publish',
		'tax_query' => $tax_query,
		'posts_per_page' => -1
	);
	$query = new WP_Query( $args );
	if( $query->have_posts( ) ): 
		ob_start(); 
		while( $query->have_posts( ) ): $query->the_post( ); 
			get_template_part( 'templates/loop', 'venues', array( 'post' => get_the_ID() ) );
		endwhile;
	else: ?>
		<div class="no-venue">No venues found.</div>
	<?php endif;

	wp_reset_query(  );
	$res->output = ob_get_clean();

    $res->has_more_pages = false;
    if ($query->max_num_pages > ( $page + 1 )) {
        $res->page = $page + 1;
        $res->has_more_pages = true;
    }

	echo json_encode($res);
	die;
}