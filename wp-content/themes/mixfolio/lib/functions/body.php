<?php

/*
 * Extends the body_class function for improved css targeting
 * @package WordPress
 * @subpackage GPP
 * @since GPP 1.0
 */

/**
 * Filters the body_class and adds the appropriate browser class
 */
function gpp_base_browser_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
		if($is_lynx) $classes[] = 'browser-lynx';
		elseif($is_gecko) $classes[] = 'browser-gecko';
		elseif($is_opera) $classes[] = 'browser-opera';
		elseif($is_NS4) $classes[] = 'browser-ns4';
		elseif($is_safari) $classes[] = 'browser-safari';
		elseif($is_chrome) $classes[] = 'browser-chrome';
		elseif($is_IE) $classes[] = 'browser-ie';
		else $classes[] = '';
		if($is_iphone) $classes[] = 'browser-iphone';
	return $classes;
}
// Filter body_class with the function above
add_filter('body_class','gpp_base_browser_class');

/**
 * Adds custom classes to the array of body classes.
 */
function gpp_body_classes( $classes ) {
	// Adds a class of single-author to blogs with only 1 published author
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	return $classes;
}
// Filter body_class with the function above
add_filter( 'body_class', 'gpp_body_classes' );