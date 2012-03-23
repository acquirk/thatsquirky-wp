<?php

/*
 * Menu helper functions
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 * @package WordPress
 * @subpackage GPP
 * @since GPP 1.0
 */

function gpp_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'gpp_page_menu_args' );

function gpp_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search for:', 'gpp') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'gpp_search_form' );

function gpp_menu_default() {
	echo '<ul class="menu"><li><a href="'.site_url().'/wp-admin/nav-menus.php">Create Menu</a></li></ul>';
}