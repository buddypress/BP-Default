<?php
/**
 * BuddyPress - Users Unread Notifications
 * 
 * @package BuddyPress
 * @subpackage BP Default
 */
?>

<?php if ( bp_has_notifications() ) : ?>

	<div id="pag-top" class="pagination no-ajax">

		<div class="pag-count" id="notifications-count-top">
			<?php bp_notifications_pagination_count(); ?>
		</div><!-- .pag-count -->

		<div class="pagination-links" id="notifications-pag-top">
			<?php bp_notifications_pagination_links(); ?>
		</div><!-- .pagination-links -->

	</div><!-- .pagination -->

	<?php bp_get_template_part( 'members/single/notifications/notifications-loop' ); ?>

	<div id="pag-bottom" class="pagination no-ajax">

		<div class="pag-count" id="notifications-count-bottom">
			<?php bp_notifications_pagination_count(); ?>
		</div><!-- .pag-count -->

		<div class="pagination-links" id="notifications-pag-bottom">
			<?php bp_notifications_pagination_links(); ?>
		</div><!-- .pagination-links -->

	</div><!-- .pagination -->

<?php else : ?>

	<?php bp_get_template_part( 'members/single/notifications/feedback-no-notifications' ); ?>

<?php endif;
