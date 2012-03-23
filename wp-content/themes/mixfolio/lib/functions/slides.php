<?php
/**
 * Slideshows!  
 *
 * @subpackage GPP
 * @since GPP 1.0
 */
 
/** A static slideshow. Pulls images from slides subfolder in images folder. */
function gpp_slides_static() { ?>
	<div id="slides_wrap">
		<div id="slides">
			<div class="slides_container">
   		<?php
   			$images = array();
				$images = scandir( GPP_IMAGES_DIR .'/slides/');
				$count = 0;
				
		    foreach($images as $image) {
		    	$count++;
		      if ($image != '.' && $image != '..' && $image != '.svn' && $image != '.git') {
		      	echo '<div class="slide">';
						echo '<img src="'.GPP_IMAGES_URL .'/slides/'.$image.'" title="" alt="" />';
						echo '<div class="caption">
							<h2>Happy Bokeh raining Day</h2>
							<p>Curabitur blandit tempus porttitor.</p>
						</div>';
						echo '<p><a href="#'.$count.'" class="link">'.$count.' &rsaquo;</a></p>';
						echo '</div>',"\n";
					}
				}
			?>
			</div><!-- .slides_container -->
			<a href="#" class="prev">Previous</a>
			<a href="#" class="next">Next</a>
	  </div><!-- #slides -->
	  <img src="<?php echo GPP_IMAGES_URL; ?>/frame.png" width="739" height="341" alt="Example Frame" id="frame">
	 </div><!-- #slides_wrap -->
<?php } 

/** A static slideshow. Add slides using the OptionTree plugin
	* Requires the OptionTree plugin
	* http://wordpress.org/extend/plugins/option-tree/
	*/
function gpp_slides_ot() {
	if ( function_exists( 'get_option_tree' ) ) {
		$template = get_template_directory_uri();
		echo '<div id="slides_wrap">
					<div id="slides">
						<div class="slides_container">';
	  $slides = get_option_tree( 'slides', $option_tree, false, true, -1 );
	  foreach( $slides as $slide ) {
	    echo '<a href="'.$slide['link'].'" title="'.$slide['title'].' - '.$slide['description'].'"><img src="'.$slide['image'].'" alt="'.$slide['title'].' - '.$slide['description'].'" /></a>',"\n";
	  }
	  echo '</div><!-- .slides_container -->
	  			</div><!-- #slides -->
	  			</div><!-- #slides_wrap -->';
	}
}

/** A slideshow for posts */
function gpp_slides_post($size,$thumbssize) { ?>

				<div id="slides_wrap"> 
					<div id="slides"> 
						<div class="slides_container">
							<?php gpp_attachments($size); ?>
						</div>
						<ul class="pagination">
							<?php gpp_attachments($thumbssize); ?>
						</ul>
					</div>
				</div>
<?php }

/** Get all post attachments */
function gpp_attachments($size) {
	global $post;
	$args = array(
		'order'          => 'ASC',
		'orderby' 		 => 'menu_order',
		'post_type'      => 'attachment',
		'post_parent'    => $post->ID,
		'post_mime_type' => 'image',
		'post_status'    => null,
		'numberposts'    => -1,
		'size' => $size,
	);
	
	$attachments = get_posts($args);
	if ($attachments) {
		foreach ($attachments as $attachment) {
		echo '<a href="#">';
			echo wp_get_attachment_image($attachment->ID, $size, false, false);
		$description = $attachment->post_content;
		if (isset($description)) { echo '';}
		echo '</a>';
		}
	}
}


?>