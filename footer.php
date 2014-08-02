<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #container element.
 *
 * @package BuddyPress
 * @subpackage BP Default
 */
?>
	</div><!-- #container -->

	<?php do_action( 'bp_after_container' ); ?>
	<?php do_action( 'bp_before_footer'   ); ?>

	<div id="footer">

		<?php if ( is_active_sidebar( 'first-footer-widget-area' ) || is_active_sidebar( 'second-footer-widget-area' ) || is_active_sidebar( 'third-footer-widget-area' ) || is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
		<div id="footer-widgets">
			<?php get_sidebar( 'footer' ); ?>
		</div><!-- #footer-widgets -->
		<?php endif; ?>

		<div id="site-generator" role="contentinfo">
			<?php do_action( 'bp_dtheme_credits' ); ?>
			<p><?php printf( __( 'Proudly powered by <a href="%1$s">WordPress</a> and <a href="%2$s">BuddyPress</a>.', 'buddypress' ), 'http://wordpress.org', 'http://buddypress.org' ); ?></p>
		</div><!-- #site-generator -->

		<?php do_action( 'bp_footer' ); ?>

	</div><!-- #footer -->

	<?php do_action( 'bp_after_footer' ); ?>
	
	<?php wp_footer(); ?>

</body>
</html>