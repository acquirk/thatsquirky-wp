<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage GPP
 * @since GPP 1.0
 */

get_header(); ?>

		<div id="primary" class="full-width">
			<div id="content" role="main">
				
				<?php get_template_part('part', 'hero'); ?>
							
				<?php

					$cats = get_option_tree('gpp_home_categories');
					$category_query = new WP_Query('posts_per_page='.$gpp['gpp_home_post_number'].'&cats='.$cats);

					$categories_with_posts = array();
					
		        	if ( have_posts() ) : while ($category_query->have_posts()) : $category_query->the_post();
		        		$categories = get_the_category();
					    foreach ( $categories as $category ) {
							$categories_with_posts[get_category($category)->slug] = $category;
					    }
		            endwhile; endif;
		            wp_reset_postdata();
					ksort($categories_with_posts);

					$categories = array_values($categories_with_posts);
					echo '<ul id="filter" class="breadcrumb">',"\n";
					echo '<li class="title">Recent Work:</li>';
					echo '<li class="active"><a href="javascript:void(0);" class="all">All</a> <span class="divider">/</span></li>',"\n";
					if ( $categories <> '' ) {
					    foreach ( $categories as $category ) {
						echo '<li><a href="javascript:void(0);" class="'.get_category($category)->slug.'">'.get_category($category)->name.'</a> <span class="divider">/</span></li>',"\n";
					    }
				    }
					echo '</ul><!-- #filter -->',"\n\n";
					
					echo '<ul class="grid">',"\n";
        	$i=0;

        	if ( have_posts() ) : while ($category_query->have_posts()) : $category_query->the_post();
        		$categories = get_the_category();
        		$i++;
					?>
          	<li data-id="id-<?php echo $i; ?>" data-filter-type="<?php foreach ( $categories as $category ) { echo $category->slug, ' '; }?> " class="<?php foreach ( $categories as $category ) { echo $category->slug, ' '; } ?> wrap four columns <?php echo $post->ID; ?>">
        			<div class="entry-link">
        				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','gpp_i18n'),the_title_attribute('echo=0')); ?>"></a>
        			</div>
							<?php
								if ( has_post_thumbnail() )
									the_post_thumbnail();
								else
									echo '<img src="'.get_stylesheet_directory_uri().'/images/image.jpg" class="wp-post-image"/>';
							?>
        			<div class="hide" style="display: none">
        				<h1 class="entry-title"><?php the_title(); ?></h1>
        				<footer class="entry-meta">
        					<span class="postdate"><?php echo get_the_date(); ?></span>
        					<span class="format <?php echo get_post_format(); ?>"><?php echo get_post_format(); ?></span>
        				</footer><!-- .entry-meta -->
        			</div>
            </li><!-- #post-<?php the_ID(); ?> .four.columns -->
            
            <?php
	            endwhile; endif; $i =0;
	            wp_reset_postdata();
	            echo '</ul><!-- .holder -->',"\n";
           	?>
        
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>