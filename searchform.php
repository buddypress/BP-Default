<?php
/**
 * The Search Form.
 *
 * @package BuddyPress
 * @subpackage BP_Default
 */
?>

<?php do_action( 'bp_before_blog_search_form' ); ?>

<form role="search" method="get" id="searchform" action="<?php echo home_url(); ?>/">
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'bp-default' ); ?>" />

	<?php do_action( 'bp_blog_search_form' ); ?>

</form><!-- #searchform

<?php do_action( 'bp_after_blog_search_form' ); ?>
