<?php
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M' );
@ini_set( 'max_execution_time', '300' );

//JS THEMES
class wp_ng_theme {
	function enqueue_scripts() {
		wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.map', array('jquery'), '1.0', false);
		wp_enqueue_script( 'angular-core', 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js', array( 'jquery' ), '1.0', false );
		wp_enqueue_script( 'ng-resource', 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.0-rc.0/angular-resource.min.js?ver=1.0', array( 'jquery' ), '1.0', false );
		wp_enqueue_script( 'ng-sanitize', 'https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.6.8/angular-sanitize.js', array( 'jquery' ), '1.0', false );
		wp_enqueue_script( 'ngScripts', get_template_directory_uri() . '/assets/js/app.js', array( ), '1.0', false );
		wp_localize_script( 'ngScripts', 'appInfo',
			array(
				'api_url'		=> rest_get_url_prefix() . '/wp/v2/',
				'template_directory' 	=> get_template_directory_uri() . '/',
				'nonce'			=> wp_create_nonce( 'wp_rest' ),
				'is_admin'		=> current_user_can('administrator')
			)
		);
	}
}
$ngTheme = new wp_ng_theme();
add_action( 'wp_enqueue_scripts', array( $ngTheme, 'enqueue_scripts' ) );

require get_template_directory() . '/customizer.php';

// NAVIGATION

function main_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'main-menu',
        'menu'            => '',
        'container'       => false,
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '%3$s',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}

function register_main_menu()
{
    register_nav_menus(
        array(
            'main-menu' => __( 'Main Menu' ), // Main Navigation
        )
    );
}
add_action( 'init', 'register_main_menu' );

// CUSTOM POST TYPES
register_post_type( 'people', array(
    'labels' => array(
        'name' => 'People',
        'singular_name' => 'Person',
    ),
    'description' => 'Team Members',
    'public' => true,
    'menu_icon' => 'dashicons-groups',
    'menu_position' => 19,
    'supports' => array( 'title' ),
    'show_in_rest'	=> true,
    'publicly_queryable' => true,
));

register_post_type( 'Listings', array(
    'labels' => array(
        'name' => 'Listings',
        'singular_name' => 'Listings',
    ),
    'description' => 'Listings',
    'public' => true,
    'menu_icon' => 'dashicons-admin-multisite',
    'menu_position' => 10,
    'supports' => array( 'title' ),
    'show_in_rest'	=> true,
    'publicly_queryable' => true,
    'hierarchical'        => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'taxonomies' => array( 'category' ),      
));

// Enable vCard Upload

function be_enable_vcard_upload( $mime_types ){
  $mime_types['vcf'] = 'text/x-vcard';
  return $mime_types;
}
add_filter('upload_mimes', 'be_enable_vcard_upload' );

// Add theme support for Featured Images
add_theme_support('post-thumbnails', array(
'post',
'page',
'custom-post-type-name',
));

// ADD GET EXCERPT

function custom_excerpt_length( $length ) {
        return 20;
    }
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
  
?>