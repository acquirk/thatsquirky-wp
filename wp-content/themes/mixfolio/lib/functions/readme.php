<?php

// Hook Instructions page to admin_menu
add_action('admin_menu', 'gpp_instructions_submenu_page');

// Add Instructions link to menu
function gpp_instructions_submenu_page() {
	add_theme_page( GPP_THEME_NAME. ' Instructions', 'Instructions', 'manage_options', 'gpp-instructions-page', 'gpp_instructions_page_callback' );
}

// The Instructions Page: Suck in the readme.txt file and parse that mofo
function gpp_instructions_page_callback() {
	echo '<div class="wrap">';
	echo "<h2>".GPP_THEME_NAME.__(' Instructions')."</h2>";
	echo '<p class="desc">Version '.GPP_THEME_VERSION.' of <a href="'.GPP_THEME_HOMEPAGE.'" title="'.GPP_THEME_NAME.' WordPress Theme by Graph Paper Press">'.GPP_THEME_NAME.'</a> was created by '.GPP_THEME_AUTHOR.'.</p>';
	$response = wp_remote_get( get_stylesheet_directory_uri().'/readme.txt' );
	if( is_wp_error( $response ) ) {
	   echo 'Unable to load the instructions.  <a href="'.GPP_THEME_HOMEPAGE.'/support/">Download the instructions</a> instead.';
	} else {
	   $readme = $response['body'];
	}
	
	// make links clickable
	$readme = make_clickable(nl2br(esc_html($readme)));
	// code, strong, em
	$readme = preg_replace('/`(.*?)`/', '<code>\\1</code>', $readme);
	$readme = preg_replace('/[\040]\*\*(.*?)\*\*/', ' <strong>\\1</strong>', $readme);
	$readme = preg_replace('/[\040]\*(.*?)\*/', ' <em>\\1</em>', $readme);
	// headings
	$readme = preg_replace('/=== (.*?) ===/', '<h2>\\1</h2>', $readme);
	$readme = preg_replace('/== (.*?) ==/', '<h3>\\1</h3>', $readme);
	$readme = preg_replace('/= (.*?) =/', '<h4>\\1</h4>', $readme);
	// links
	$readme = preg_replace('#(^|[\[]{1}[\s]*)([^\n<>^\)]+)([\]]{1}[\(]{1}[\s]*)(http://|ftp://|mailto:|https://)([^\s<>]+)([\s]*[\)]|$)#', '<a href="$4$5">$2</a>', $readme);
	$readme = preg_replace('#(^|[^\"=]{1})(http://|ftp://|mailto:|https://)([^\s<>]+)([\s\n<>]|$)#', '$1<a href="$2$3">$2$3</a>$4', $readme);
	
	echo $readme;
	echo '</div>';
}
