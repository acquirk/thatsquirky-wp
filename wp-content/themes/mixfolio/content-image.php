<?php
/**
 * The template for displaying posts in the Image Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage GPP
 * @since GPP 1.2
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php do_action( 'gpp_before_title' ); ?>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'gpp' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php do_action( 'gpp_after_title' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	<dl class="tabs">
		<dd><a class="active" href="#simple1"><?php echo get_post_format(); ?></a></dd>
		<dd><a href="#simple2">Info</a></dd>
		<?php if ( comments_open() ){ ?>
		<dd><a href="#simple3"><?php comments_number( 'Comments', '1 Comment', '% Comments' ); ?></a></dd>
		<?php } ?>
	</dl>
	<ul class="tabs-content">
		<li id="simple1Tab" class="active">
			<?php the_post_thumbnail('large'); ?>
		</li>
		<li id="simple2Tab">
			<?php do_action( 'gpp_before_content' ); ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'gpp' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'gpp' ), 'after' => '</div>' ) ); ?>
			<?php do_action( 'gpp_after_content' ); ?>
			<footer class="entry-meta">
				<?php do_action( 'gpp_before_meta' ); ?>
				<?php gpp_posted_on(); ?>
				<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
				<span class="sep"> | </span>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'gpp' ), __( '1 Comment', 'gpp' ), __( '% Comments', 'gpp' ) ); ?></span>
				<?php endif; ?>
				<?php edit_post_link( __( 'Edit', 'gpp' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
				<?php do_action( 'gpp_before_meta' ); ?>
			</footer><!-- #entry-meta -->
		</li>
		<?php if ( comments_open() ){ ?>
		<li id="simple3Tab">
			<?php comments_template( '', true ); ?>
		</li>
		<?php } ?>
	</ul>

	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->