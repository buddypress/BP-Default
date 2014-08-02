<?php
/**
 * BuddyPress - Activation
 *
 * @package BuddyPress 
 * @subpackage BP Default
 */

get_header(); ?>

		<div id="content">
			<div class="padder">

				<?php do_action( 'bp_before_activation_page' ); ?>

				<div class="page" id="activate-page">

					<h3><?php if ( bp_account_was_activated() ) :
						_e( 'Account Activated', 'bp-default' );
					else :
						_e( 'Activate your Account', 'bp-default' );
					endif; ?></h3>

					<?php do_action( 'template_notices' ); ?>

					<?php do_action( 'bp_before_activate_content' ); ?>

					<?php if ( bp_account_was_activated() ) : ?>

						<?php if ( isset( $_GET['e'] ) ) : ?>
							<p><?php _e( 'Your account was activated successfully! Your account details have been sent to you in a separate email.', 'bp-default' ); ?></p>
						<?php else : ?>
							<p><?php printf( __( 'Your account was activated successfully! You can now <a href="%s">log in</a> with the username and password you provided when you signed up.', 'bp-default' ), wp_login_url( bp_get_root_domain() ) ); ?></p>
						<?php endif; ?>

					<?php else : ?>

						<p><?php _e( 'Please provide a valid activation key.', 'bp-default' ); ?></p>

						<form action="" method="get" class="standard-form" id="activation-form">

							<label for="key"><?php _e( 'Activation Key:', 'bp-default' ); ?></label>
							<input type="text" name="key" id="key" value="" />

							<p class="submit">
								<input type="submit" name="submit" value="<?php esc_attr_e( 'Activate', 'bp-default' ); ?>" />
							</p>

						</form><!-- #activation-form -->

					<?php endif; ?>

					<?php do_action( 'bp_after_activate_content' ); ?>

				</div><!-- .page -->

				<?php do_action( 'bp_after_activation_page' ); ?>

			</div><!-- .padder -->
		</div><!-- #content -->

	<?php get_sidebar( 'buddypress' ); ?>

<?php get_footer( 'buddypress' ); ?>