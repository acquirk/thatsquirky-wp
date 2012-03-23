<?php

/*
 * Register widgetized area and update sidebar with default widgets
 * @package WordPress
 * @subpackage GPP
 * @since GPP 1.0
 */

function gpp_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar 1', 'gpp' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar 2', 'gpp' ),
		'id' => 'sidebar-2',
		'description' => __( 'An optional second sidebar area', 'gpp' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'init', 'gpp_widgets_init' );