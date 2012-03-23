<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage GPP
 * @since GPP 1.0
 */

get_header(); ?>

		<section id="primary" class="full-width">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
							if ( is_day() ) :
								printf( __( 'Daily Archives: %s', 'gpp' ), '<span>' . get_the_date() . '</span>' );
							elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'gpp' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
							elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'gpp' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
							else :
								_e( 'Archives', 'gpp' );
							endif;
						?>
					</h1>
				</header>

				<?php rewind_posts(); ?>

				<?php // gpp_content_nav( 'nav-above' ); ?>

				<ul class="grid">
				  <?php while (have_posts()) : the_post(); ?>
          	<li class="wrap four columns">
        			<div class="entry-link">
        				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','gpp'),the_title_attribute('echo=0')); ?>"></a>
        			</div>
							<?php
								if ( has_post_thumbnail() )
									the_post_thumbnail();
								else
									echo '<img src="'.get_stylesheet_directory_uri().'/images/image.jpg" class="wp-post-image" />';
							?>
        			<div class="hide" style="display: none">
        				<h1 class="entry-title"><?php the_title(); ?></h1>
        				<footer class="entry-meta">
        					<span class="postdate"><?php echo get_the_date(); ?></span>
        					<span class="format <?php echo get_post_format(); ?>"><?php echo get_post_format(); ?></span>
        				</footer><!-- .entry-meta -->
        			</div>
            </li><!-- #post-<?php the_ID(); ?> .four.columns -->
            
					<?php endwhile; ?>
				</ul><!-- .grid -->

				<?php gpp_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'gpp' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'gpp' ); ?></p>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>