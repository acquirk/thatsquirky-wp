<?php

/*
 * These functions display define Post loops
 * @package WordPress
 * @subpackage GPP
 * @since GPP 1.0
 */

if ( ! function_exists( 'gpp_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own gpp_posted_on to override in a child theme
 *
 * @since GPP 1.2
 */
function gpp_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'gpp' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'gpp' ), get_the_author() ),
		esc_html( get_the_author() )
	);
}
endif;

/**
 * Changes the excerpt to 35 characters
 *
 * @since GPP 1.0
 */
function gpp_custom_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'gpp_custom_excerpt_length', 999 );

/**
 * Removes height and width from thumbnails for responsive design
 *
 * @since GPP 1.0
 */
function gpp_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter( 'post_thumbnail_html', 'gpp_remove_thumbnail_dimensions', 10, 3 );