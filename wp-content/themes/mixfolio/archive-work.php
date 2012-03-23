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
					<h1 class="page-title"><?php ?></h1>
				</header>

				<?php rewind_posts(); ?>

<ul id="filter" class="breadcrumb">
	<li class="title"><?php _e('Recent Work', 'gpp' ); ?>:</li>
	<li class="active"><a href="#" class="all"><?php _e('All', 'gpp'); ?></a> <span class="divider">/</span></li>
	<?php $categories = get_categories('taxonomy=type'); ?>
	<?php
		foreach ( $categories as $category ) {
			echo '<li><a href="#" class="'.get_category($category)->slug.'">'.get_category($category)->name.'</a> <span class="divider">/</span></li>',"\n";
		}
	?>
</ul><!-- #filter -->
					
<ul class="grid">
<?php
	$i=0;
	$work_query = new WP_Query('post_type=work');
	while ($work_query->have_posts()) : $work_query->the_post();
		$i++;
  	$terms = get_the_terms($post->ID, 'type');
?>
	<li data-id="id-<?php echo $i; ?>" data-type="<?php foreach ( $terms as $term ) { echo $term->slug, ' '; } ?>" class="wrap four columns">
		<div class="entry-link">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','gpp'),the_title_attribute('echo=0')); ?>"></a>
		</div>
		<?php
			if ( has_post_thumbnail() )
				the_post_thumbnail('medium');
			else
				echo '<img src="'.get_stylesheet_directory_uri().'/images/image.jpg" class="wp-post-image" />';
		?>
		<div class="hide" style="display: none">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php the_excerpt(); ?>
		</div>
	</li><!-- #post-<?php the_ID(); ?> .four.columns -->
	
	<?php endwhile; $i =0; ?>
	<?php wp_reset_postdata(); ?>
</ul><!-- .holder -->
           	
			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'gpp' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Use the search box above to help.', 'gpp' ); ?></p>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>