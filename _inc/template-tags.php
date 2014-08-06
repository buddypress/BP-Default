<?php
/**
 * Template tags for this theme.
 *
 * @package BuddyPress
 * @subpackage BP Default
 */
 
if ( ! function_exists( 'bp_default_search_form' ) ) :
/**
 * Replace regular search form with BuddyPress Search Form
 * if BuddyPress is activated.
 */
function bp_default_search_form() {
	// Regular search form if BuddyPress is not activated.
	if ( ! function_exists( 'bp_is_active' ) ) { 
		get_search_form();
	} else { 
	?>

		<form action="<?php echo bp_search_form_action(); ?>" method="post" id="search-form">
			<label for="search-terms" class="accessibly-hidden"><?php _e( 'Search for:', 'buddypress' ); ?></label>
			<input type="text" id="search-terms" name="search-terms" value="<?php echo isset( $_REQUEST['s'] ) ? esc_attr( $_REQUEST['s'] ) : ''; ?>" />

			<?php echo bp_search_form_type_select(); ?>

			<input type="submit" name="search-submit" id="search-submit" value="<?php esc_attr_e( 'Search', 'buddypress' ); ?>" />
			<?php wp_nonce_field( 'bp_search_form' ); ?>
		</form><!-- #search-form -->

	<?php }

}
endif;
 
if ( ! function_exists( 'bp_default_messages_login' ) ) :
/**
 * Display BuddyPress Log in and Sitewide Messages
 * in sidebar if BuddyPress is activated.
 */
function bp_default_messages_login() {
	// Nothing there if BuddyPress is not activated.
	if ( ! function_exists( 'bp_is_active' ) ) {
		return;
	} 
	?>

	<?php if ( is_user_logged_in() ) : ?>

		<?php do_action( 'bp_before_sidebar_me' ) ?>

		<div id="sidebar-me">
			<a href="<?php echo bp_loggedin_user_domain() ?>">
				<?php bp_loggedin_user_avatar( 'type=thumb&width=40&height=40' ) ?>
			</a>

			<h4><?php echo bp_core_get_userlink( bp_loggedin_user_id() ); ?></h4>
			<a class="button logout" href="<?php echo wp_logout_url( bp_get_root_domain() ) ?>"><?php _e( 'Log Out', 'bp-default' ) ?></a>

			<?php do_action( 'bp_sidebar_me' ) ?>
		</div>

		<?php do_action( 'bp_after_sidebar_me' ) ?>

		<?php if ( bp_is_active( 'messages' ) ) : ?>
			<?php bp_message_get_notices(); /* Site wide notices to all users */ ?>
		<?php endif; ?>

	<?php else : ?>

		<?php do_action( 'bp_before_sidebar_login_form' ) ?>

		<?php if ( bp_get_signup_allowed() ) : ?>
		
			<p id="login-text">
				<?php printf( __( 'Please <a href="%s" title="Create an account">create an account</a> to get started.', 'bp-default' ), site_url( bp_get_signup_slug() . '/' ) ) ?>
			</p>

		<?php endif; ?>

		<form name="login-form" id="sidebar-login-form" class="standard-form" action="<?php echo site_url( 'wp-login.php', 'login_post' ) ?>" method="post">
			<label><?php _e( 'Username', 'bp-default' ) ?><br />
			<input type="text" name="log" id="sidebar-user-login" class="input" value="<?php if ( isset( $user_login) ) echo esc_attr(stripslashes($user_login)); ?>" tabindex="0" /></label>

			<label><?php _e( 'Password', 'bp-default' ) ?><br />
			<input type="password" name="pwd" id="sidebar-user-pass" class="input" value="" tabindex="0" /></label>

			<p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="sidebar-rememberme" value="forever" tabindex="0" /> <?php _e( 'Remember Me', 'bp-default' ) ?></label></p>

			<?php do_action( 'bp_sidebar_login_form' ) ?>
			<input type="submit" name="wp-submit" id="sidebar-wp-submit" value="<?php _e( 'Log In', 'bp-default' ); ?>" tabindex="0" />
			<input type="hidden" name="testcookie" value="1" />
		</form>

		<?php do_action( 'bp_after_sidebar_login_form' ) ?>

	<?php endif; ?>

<?php 
}
endif;
