<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage GPP
 * @since GPP 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php do_action( 'gpp_before_title' ); ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php
  			$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
  			if ($children) { ?>
  				<ul class="subpage">
  					<?php echo $children; ?>
  				</ul>
  		<?php } ?>
  	<?php do_action( 'gpp_after_title' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php do_action( 'gpp_before_content' ); ?>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'gpp' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'gpp' ), '<span class="edit-link">', '</span>' ); ?>
		<?php do_action( 'gpp_after_content' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
