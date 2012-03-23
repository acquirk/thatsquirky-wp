<?php
	$gpp = get_option( 'option_tree' );
	if (isset($gpp['gpp_welcome_area'])) {
	$welcome_area = $gpp['gpp_welcome_area'];
    }   
	if ( isset($welcome_area) && $welcome_area == 'Show') {
?>
				<div class="row">
					<div class="hero clearfix">
						<div class="columns eight">
						<?php
							$welcome_title = $gpp['gpp_welcome_message_title'];
							if ($welcome_title) {
								echo '<h2>'.$welcome_title.'</h2>';
							}
							$welcome = $gpp['gpp_welcome_message'];
							if ($welcome) {
								echo '<h4 class="subheader">'.$welcome.'</h4>';
							}
						?>
						</div>
						<div class="columns four">
						<?php 
							$twitter = $gpp['gpp_twitter_id'];
							if ($twitter) { ?>
								<h3 class="twitter"><a href="http://twitter.com/<?php echo $twitter; ?>/" title="<?php _e('Follow me on Twitter', 'gpp'); ?>"><?php _e('Follow Me', 'gpp'); ?></a></h3>
								<div id="tweets"></div>
								<hr />
						<?php	} ?>
							<a href="#" class="button charcoal radius large full-width" data-reveal-id="contact"><?php _e('Contact Me', 'gpp'); ?></a>
						</div><!-- .columns.four -->
					</div><!-- .hero -->
				</div><!-- .row -->

<?php } ?>