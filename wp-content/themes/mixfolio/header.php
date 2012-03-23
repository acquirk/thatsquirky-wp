<?php
$gpp = get_option( 'option_tree' );
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage GPP
 * @since GPP 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1.0, width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'gpp' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/lib/css/mobile.css" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<?php 
if ( function_exists( 'get_option_tree' ) ) {
	if ( isset($gpp['gpp_css']) && $gpp['gpp_css'] != "" ) {
  	echo '<link rel="stylesheet" type="text/css" media="all" href="'.CHILD_URL.'/dynamic.css" />';
	} // end $gpp_css
	 if ( isset($gpp['gpp_twitter_id']) && $gpp['gpp_twitter_id'] != "" && is_home() ) { ?>   
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('#tweets').tweetable({
					limit: 1,
					username: '<?php echo $gpp['gpp_twitter_id']; ?>',
					replies: true,
				});
			});
		</script>
	<?php	} // end $twitter ?>
<?php } // end function_exists ?>
</head>

<body lang="en" <?php body_class(); ?>>
<?php do_action( 'gpp_before_page' ); ?>
<div id="page" class="container hfeed">
<?php do_action( 'gpp_before_header' ); ?>
	<header id="branding" role="banner" data-dropdown="dropdown">
		<div id="branding-inner">
			<div class="container">
				<hgroup>
				  	<?php
             
            if ( function_exists( 'get_option_tree') && get_option_tree( 'gpp_logo') <>'') { ?>
                
             <h1 id="site-title"><a href="<?php echo home_url(); ?>/" title="Home"><img src="<?php get_option_tree( 'gpp_logo', '', true ); ?>" id="logo-image-home" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /></a></h1>
            <?php } else { ?> 
                
             <h1 id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php } ?>  

					<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
				</hgroup>
				<nav class="nav" role="navigation">	
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'gpp_menu_default' ) ); ?>
					
				</nav><!-- #access -->
				<div class="hide-on-phones"><?php get_search_form(); ?></div>
			</div><!-- .container -->
		</div><!-- #branding-inner -->
	</header><!-- #branding -->
<?php do_action( 'gpp_after_header' ); ?>

	<div id="main" class="row">
		<div class="twelve columns">