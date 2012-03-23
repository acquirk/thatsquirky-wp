<?php
/**
 * Style Extensions - A WordPress script for post-specific stylesheets.
 *
 * Style Extensions allows users and developers to add unique, per-post stylesheets.  This script was 
 * created so that custom stylesheet files could be dropped into the active theme's '/css' folder and loaded for 
 * individual posts using the 'Stylesheet' post meta key and the stylesheet name as the post meta value.
 *
 * @package GPP
 * @version 1.0
 */
 
/* Adds a custom stylesheet to a singular post, page or type */
function gpp_add_custom_stylesheet() {

	/* Get the global post var */
	global $post;

	/* Are we viewing a singular post, page or type? */
	if (is_singular()) {
		
		/* Sets $styleesheet variable to the value of the css custom field */
		$stylesheet = get_post_meta($post->ID, 'css', true);
    
		/* Checks if the custom field has a value and that the stylesheet actually exists on the server */
		if ($stylesheet) {
		
			/* Echos the stylesheet link */
			echo '<link rel="stylesheet" href="'.$stylesheet.'" type="text/css" media="screen,projection,tv" />';
			
		}
	
	}

}

/* Register with hook 'wp_print_styles' */
add_action('wp_print_styles', 'gpp_add_custom_stylesheet', 2);