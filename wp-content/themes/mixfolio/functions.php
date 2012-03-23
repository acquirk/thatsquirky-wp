<?php
/**
 * GPP functions and definitions
 * @subpackage GPP
 *
 * @since GPP 1.0
 */
 
 /** Load Theme Options */
$gpp = get_option( 'option_tree' );

// Load Text Domain
load_theme_textdomain('gpp',get_template_directory().'/lang');


/** Run the gpp_pre hook */
do_action( 'gpp_pre' );

add_action( 'gpp_init', 'gpp_theme_support' );
/**
 * This function activates default theme features
 *
 * @since 1.0
 */ 
 
 
function gpp_theme_support() {

	add_custom_background();
	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'image', 'gallery', 'link', 'quote', 'video' ) );
	add_editor_style('style-editor.css');

}

add_action( 'gpp_init', 'gpp_constants' );
/**
 * This function defines the GPP theme constants
 *
 * @since 1.0
 */
function gpp_constants() {

	/** Theme Data Constants */
	$theme_data = get_theme_data(get_stylesheet_directory().'/style.css');
	define('GPP_THEME_NAME', $theme_data['Name']);
	define('GPP_THEME_AUTHOR', $theme_data['Author']);
	define('GPP_THEME_AUTHOR_URI', $theme_data['AuthorURI']);
	define('GPP_THEME_HOMEPAGE', $theme_data['URI']);
	define('GPP_THEME_VERSION', trim($theme_data['Version']));
	define('GPP_THEME_DESC', trim($theme_data['Description']));

	/** Define Theme Info Constants */
	define( 'PARENT_THEME_NAME', 'Mixfolio' );
	define( 'PARENT_THEME_VERSION', '1.0' );

	/** Define Directory Location Constants */
	define( 'PARENT_DIR', get_template_directory() );
	define( 'CHILD_DIR', get_stylesheet_directory() );
	define( 'GPP_IMAGES_DIR', PARENT_DIR . '/images' );
	define( 'GPP_CHILD_IMAGES_DIR', CHILD_DIR . '/images' );
	define( 'GPP_LIB_DIR', PARENT_DIR . '/lib' );
	define( 'GPP_FUNCTIONS_DIR', GPP_LIB_DIR . '/functions' );
	define( 'GPP_JS_DIR', GPP_LIB_DIR . '/js' );
	define( 'GPP_CHILD_JS_DIR', CHILD_DIR . '/js' );
	define( 'GPP_CSS_DIR', GPP_LIB_DIR . '/css' );
	if ( ! defined( 'GPP_LANGUAGES_DIR' ) ) /** So we can define with a child theme */
		define( 'GPP_LANGUAGES_DIR', GPP_LIB_DIR . '/languages' );

	/** Define URL Location Constants */
	define( 'PARENT_URL', get_template_directory_uri() );
	define( 'CHILD_URL', get_stylesheet_directory_uri() );
	define( 'GPP_IMAGES_URL', PARENT_URL . '/images' );
	define( 'GPP_CHILD_IMAGES_URL', CHILD_URL . '/images' );
	define( 'GPP_LIB_URL', PARENT_URL . '/lib' );
	define( 'GPP_JS_URL', GPP_LIB_URL . '/js' );
	define( 'GPP_CHILD_JS_URL', CHILD_URL . '/lib/js' );
	define( 'GPP_CSS_URL', GPP_LIB_URL . '/css' );
	define( 'GPP_CHILD_CSS_URL', CHILD_URL . '/lib/css' );
	define( 'GPP_FUNCTIONS_URL', GPP_LIB_URL . '/functions' );
	if ( ! defined( 'GPP_LANGUAGES_URL' ) ) /** So we can predefine to child theme */
		define( 'GPP_LANGUAGES_URL', GPP_LIB_URL . '/languages' );

}

add_action( 'gpp_init', 'gpp_load_files' );
/**
 * This function loads all the files and features
 *
 * @since 1.0
 */
function gpp_load_files() {

	/** Load Functions */
	require_once( GPP_FUNCTIONS_DIR . '/body.php' );
	require_once( GPP_FUNCTIONS_DIR . '/comments.php' );
	require_once( GPP_FUNCTIONS_DIR . '/formats.php' );
	require_once( GPP_FUNCTIONS_DIR . '/i18n.php' );
	require_once( GPP_FUNCTIONS_DIR . '/menus.php' );
	require_once( GPP_FUNCTIONS_DIR . '/meta.php' );
	require_once( GPP_FUNCTIONS_DIR . '/plugins.php' );
	require_once( GPP_FUNCTIONS_DIR . '/postnav.php' );
	require_once( GPP_FUNCTIONS_DIR . '/posts.php' );
	require_once( GPP_FUNCTIONS_DIR . '/readme.php' );
	require_once( GPP_FUNCTIONS_DIR . '/slides.php' );
	require_once( GPP_FUNCTIONS_DIR . '/widgets.php' );
	

	/** Load Javascript */
	require_once( GPP_JS_DIR . '/load-scripts.php' );

	/** Load CSS */
	require_once( GPP_CSS_DIR . '/load-styles.php' );

}


add_action( 'gpp_init', 'gpp_theme_setup' );
/**
 * This function setups up the theme defaults
 *
 * @since 1.0
 */
function gpp_theme_setup() {

	/** Set image sizes */
	set_post_thumbnail_size( 300, 205, true );
	update_option('thumbnail_size_w', 300);
	update_option('thumbnail_size_h', 205);
	update_option('large_size_w', 980);

	/** Set the content width based on the theme's design and stylesheet */
	if ( ! isset( $content_width ) )
		$content_width = 980; /* pixels */
		
	/** This theme uses wp_nav_menu() in one location */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'gpp' ),
	) );
	
}

add_action( 'tgmpa_register', 'gpp_theme_register_required_plugins' ); 
/**
 * This function setups up all required plugins
 *
 * @since 1.0
 */
function gpp_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		/** This is an example of how to include a plugin from the WordPress Plugin Repository */
		array(
			'name' => 'OptionTree',
			'slug' => 'option-tree',
			'required' => true,
		),
		array(
			'name' => 'WP Post Formats',
			'slug' => 'wp-post-formats',
			'source'   => get_stylesheet_directory() . '/lib/plugins/wp-post-formats.zip', // The plugin source
			'required' => true,
		),
	);

	/** Change this to your theme text domain, used for internationalising strings */
	$theme_text_domain = 'gpp';

	/**
	 * Array of configuration settings. Uncomment and amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * uncomment the strings and domain.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array();

	tgmpa( $plugins, $config );

}

/**
 * Add custom admin styles
 */
function gpp_custom_admin_css() {
	$template = get_template_directory_uri();
   echo '<style type="text/css">
           #framework_wrap #header h1 {
    					background: url("'.$template.'/images/theme-options.png") no-repeat scroll 0 0 transparent !important;
						}
						#gallery-1 .gallery-item {
							width: 20% !important;
							height: auto !important;
							margin: 0 10px 10px 0 !important;
							
						}
						#gallery-1 .gallery-item img {
							max-width: 100% !important;
							height: auto !important;
						}
         </style>';
}
add_action('admin_head', 'gpp_custom_admin_css');

/** Run the gpp_init hook */
do_action( 'gpp_init' );

/** Run the gpp_setup hook */
do_action( 'gpp_setup' ); 


/** HTML5 rel attribute validation fix  */
add_filter( 'the_category', 'change_rel_category' );    
function change_rel_category( $text ) {
$text = str_replace('rel="category"', 'rel="tag"', $text); return $text;
}