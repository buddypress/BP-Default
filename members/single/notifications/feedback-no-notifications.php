<?php
/**
 * BuddyPress - Users Feedback for 0 Notification
 * 
 * @package BuddyPress
 * @subpackage BP Default
 */
?>

<div id="message" class="info">

	<?php if ( bp_is_current_action( 'unread' ) ) : ?>

		<?php if ( bp_is_my_profile() ) : ?>

			<p><?php _e( 'You have no unread notifications.', 'bp-default' ); ?></p>

		<?php else : ?>

			<p><?php _e( 'This member has no unread notifications.', 'bp-default' ); ?></p>

		<?php endif; ?>

	<?php else : ?>

		<?php if ( bp_is_my_profile() ) : ?>

			<p><?php _e( 'You have no notifications.', 'bp-default' ); ?></p>

		<?php else : ?>

			<p><?php _e( 'This member has no notifications.', 'bp-default' ); ?></p>

		<?php endif; ?>

	<?php endif; ?>

</div><!-- #message -->
