<?php
$gpp = get_option( 'option_tree' );
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage GPP
 * @since GPP 1.0
 */
?>
		</div><!-- .twelve .columns -->
	</div><!-- #main -->
	
	<?php do_action( 'gpp_before_footer' ); ?>

	<footer id="colophon" class="row" role="contentinfo">
		<div id="site-generator" class="twelve columns">
			<?php do_action( 'gpp_credits' ); ?>
			<a href="<?php echo GPP_THEME_AUTHOR_URI; ?>" title="<?php esc_attr_e( 'WordPress Themes', 'gpp' ); ?>" rel="external"><?php _e('WordPress Themes', 'gpp'); ?></a> by Graph Paper Press
			
			<span class="right"><?php printf(__('All content &copy; %1$s by %2$s','gpp'),date('Y'),__(get_bloginfo('name'))); ?></span>
			
		</div>
	</footer><!-- #colophon -->
	
	<?php do_action( 'gpp_after_footer' ); ?>
	
</div><!-- #page -->

<?php wp_footer(); ?>

<?php if ( isset($gpp['gpp_contact']) && $gpp['gpp_contact'] == 'Show' ) { ?>
	<div id="contact" class="reveal-modal">
		<h2><?php _e('Contact Me', 'gpp'); ?></h2>
		<?php if ( $gpp['gpp_contact_details'] != "" ) { ?>
			<p class="lead"><?php echo $gpp['gpp_contact_details']; ?></p>
		<?php } ?>
		<?php if ($gpp['gpp_contact_email'] != "") { ?>
			<p class="lead"><a href="mailto:<?php echo $gpp['gpp_contact_email']; ?>?subject=Contact Message from <?php bloginfo('name'); ?>"><?php echo $gpp['gpp_contact_email']; ?></a></p>
		<?php } ?>
		<a class="close-reveal-modal">&#215;</a>
	</div>
<?php } ?>

</body>
</html>