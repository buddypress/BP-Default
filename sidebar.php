<?php
/**
 * The Sidebar containing the primary widget area.
 *
 * @package BuddyPress
 * @subpackage BP_Default
 */
?>

<?php do_action( 'bp_before_sidebar' ); ?>

<div id="sidebar" role="complementary">
	<div class="padder">

	<?php do_action( 'bp_inside_before_sidebar' ); ?>

	<?php bp_default_messages_login(); ?>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

	<?php do_action( 'bp_inside_after_sidebar' ); ?>

	<?php wp_meta(); ?>

	</div><!-- .padder -->
</div><!-- #sidebar -->

<?php do_action( 'bp_after_sidebar' ); ?>
