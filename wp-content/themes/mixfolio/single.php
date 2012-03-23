<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage GPP
 * @since GPP 1.0
 */

get_header(); ?>

<?php $format = get_post_format(); ?>

		<div id="primary" class="<?php if ( $format == 'gallery' || $format == 'image' || $format == 'video' ) echo 'full-width'; else echo 'standard'; ?>">
			<div id="content" role="main">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<?php // gpp_content_nav( 'nav-above' ); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

				<?php gpp_content_nav( 'nav-below' ); ?>

        <?php if ( $format == '' || $format == 'standard' || $format == 'aside' || $format == 'link' || $format == 'quote' ) { comments_template( '', true ); } ?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php if ( $format == '' || $format == 'standard' || $format == 'aside' || $format == 'link' || $format == 'quote' ) { get_sidebar(); } ?>
<?php get_footer(); ?>