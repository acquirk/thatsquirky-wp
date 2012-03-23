<?php

/*
 * Adding javascripts to theme
 * First register, then enqueue
 * References: http://matty.co.za/2010/03/enqueue-javascript-in-wordpress/
 * @package WordPress
 * @subpackage GPP
 * @since GPP 1.0
 */

add_action('init','gpp_register_scripts');
// Register our scripts for easier
function gpp_register_scripts() {
	wp_register_script('core', GPP_JS_URL.'/jquery.core.js', array( 'jquery', 'dropdown', 'reveal', 'quicksand', 'easing', 'fitvids', 'selectivizr', 'forms' ), '1.0' );
	wp_register_script('selectivizr', GPP_JS_URL.'/selectivizr.min.js', array( 'jquery' ), '1.0.2' );
	wp_register_script('forms', GPP_JS_URL.'/jquery.forms.js', array( 'jquery' ), '1.0' );
	wp_register_script('reveal', GPP_JS_URL.'/jquery.reveal.js', array( 'jquery' ), '1.0' );
	wp_register_script('dropdown', GPP_JS_URL.'/jquery.dropdown.js', array( 'jquery' ), '1.0' );
	wp_register_script('easing', GPP_JS_URL.'/jquery.easing.js', array( 'jquery' ), '1.0' );
	wp_register_script('quicksand', GPP_JS_URL.'/jquery.quicksand.js', array( 'jquery','easing' ), '1.0' );
	wp_register_script('quicksanddom', GPP_JS_URL.'/jquery.quicksand.dom.js', array( 'jquery','quicksand','easing' ), '1.0' );
	wp_register_script('tweetable', GPP_JS_URL.'/jquery.tweetable.js', array( 'jquery' ), '1.0' );
	wp_register_script('fitvids', GPP_JS_URL.'/jquery.fitvids.js', array( 'jquery' ), '1.0' );
}

add_action('wp_print_scripts','gpp_enqueue_scripts');
// Wrap all required scripts in one function	for easier enqueue
function gpp_enqueue_scripts() {

	// Enqueue sitewide
	wp_enqueue_script('jquery');
	wp_enqueue_script('core');
	wp_enqueue_script('selectivizr');
	wp_enqueue_script('reveal');
	wp_enqueue_script('dropdown');
	wp_enqueue_script('fitvids');
	
	// Enqueue on home
	if ( is_home() ) {
		wp_enqueue_script('tweetable');
	}
	// Enqueue on home & archive
	if ( is_home() || is_archive() ) {
		wp_enqueue_script('quicksanddom');
		wp_enqueue_script('quicksand');
		wp_enqueue_script('easing');
	}
}