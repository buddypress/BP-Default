<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="container">
 *
 * @package BuddyPress
 * @subpackage BP Default
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="bp-default">

	<?php do_action( 'bp_before_header' ); ?>

	<div id="header">

		<div id="search-bar" role="search">
			<div class="padder">

				<h1 id="logo" role="banner"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"  rel="home"><?php bloginfo( 'name' ); ?></a></h1>

				<?php bp_default_search_form(); ?>

				<?php do_action( 'bp_search_login_bar' ); ?>

			</div><!-- .padder -->
		</div><!-- #search-bar -->

		<div id="navigation" role="navigation">
			<?php wp_nav_menu( array( 'container' => false, 'menu_id' => 'nav', 'theme_location' => 'primary', 'fallback_cb' => 'bp_dtheme_main_nav' ) ); ?>
		</div><!-- #navigation -->

		<?php do_action( 'bp_header' ); ?>

	</div><!-- #header -->

	<?php do_action( 'bp_after_header'); ?>
	<?php do_action( 'bp_before_container' ); ?>

	<div id="container">
