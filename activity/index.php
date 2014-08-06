<?php
/**
 * Template Name: BuddyPress - Activity Directory
 *
 * @package BuddyPress
 * @subpackage BP Default
 */

get_header( 'buddypress' ); ?>

		<?php do_action( 'bp_before_directory_activity_page' ); ?>

		<div id="content">
			<div class="padder">

				<?php do_action( 'bp_before_directory_activity' ); ?>

				<?php if ( !is_user_logged_in() ) : ?>

					<h3><?php _e( 'Site Activity', 'bp-default' ); ?></h3>

				<?php endif; ?>

				<?php do_action( 'bp_before_directory_activity_content' ); ?>

				<?php if ( is_user_logged_in() ) : ?>

					<?php locate_template( array( 'activity/post-form.php'), true ); ?>

				<?php endif; ?>

				<?php do_action( 'template_notices' ); ?>

				<div class="item-list-tabs activity-type-tabs" role="navigation">

					<ul>
						<?php do_action( 'bp_before_activity_type_tab_all' ); ?>

						<li class="selected" id="activity-all"><a href="<?php bp_activity_directory_permalink(); ?>" title="<?php esc_attr_e( 'The public activity for everyone on this site.', 'bp-default' ); ?>"><?php printf( __( 'All Members <span>%s</span>', 'bp-default' ), bp_get_total_member_count() ); ?></a></li>

						<?php if ( is_user_logged_in() ) : ?>

							<?php do_action( 'bp_before_activity_type_tab_friends' ); ?>

							<?php if ( bp_is_active( 'friends' ) ) : ?>

								<?php if ( bp_get_total_friend_count( bp_loggedin_user_id() ) ) : ?>

									<li id="activity-friends"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/' . bp_get_friends_slug() . '/'; ?>" title="<?php esc_attr_e( 'The activity of my friends only.', 'bp-default' ); ?>"><?php printf( __( 'My Friends <span>%s</span>', 'bp-default' ), bp_get_total_friend_count( bp_loggedin_user_id() ) ); ?></a></li>

								<?php endif; ?>

							<?php endif; ?>

							<?php do_action( 'bp_before_activity_type_tab_groups' ); ?>

							<?php if ( bp_is_active( 'groups' ) ) : ?>

								<?php if ( bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ) : ?>

									<li id="activity-groups"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/' . bp_get_groups_slug() . '/'; ?>" title="<?php esc_attr_e( 'The activity of groups I am a member of.', 'bp-default' ); ?>"><?php printf( __( 'My Groups <span>%s</span>', 'bp-default' ), bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>

								<?php endif; ?>

							<?php endif; ?>

							<?php do_action( 'bp_before_activity_type_tab_favorites' ); ?>

							<?php if ( bp_get_total_favorite_count_for_user( bp_loggedin_user_id() ) ) : ?>

								<li id="activity-favorites"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/favorites/'; ?>" title="<?php esc_attr_e( "The activity I've marked as a favorite.", 'bp-default' ); ?>"><?php printf( __( 'My Favorites <span>%s</span>', 'bp-default' ), bp_get_total_favorite_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>

							<?php endif; ?>

							<?php if ( bp_activity_do_mentions() ) : ?>

								<?php do_action( 'bp_before_activity_type_tab_mentions' ); ?>

								<li id="activity-mentions"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/mentions/'; ?>" title="<?php esc_attr_e( 'Activity that I have been mentioned in.', 'bp-default' ); ?>"><?php _e( 'Mentions', 'bp-default' ); ?><?php if ( bp_get_total_mention_count_for_user( bp_loggedin_user_id() ) ) : ?> <strong><span><?php printf( _nx( '%s new', '%s new', bp_get_total_mention_count_for_user( bp_loggedin_user_id() ), 'Number of new activity mentions', 'bp-default' ), bp_get_total_mention_count_for_user( bp_loggedin_user_id() ) ); ?></span></strong><?php endif; ?></a></li>

							<?php endif; ?>

						<?php endif; ?>

						<?php do_action( 'bp_activity_type_tabs' ); ?>

					</ul>

				</div><!-- .item-list-tabs -->

				<div class="item-list-tabs no-ajax" id="subnav" role="navigation">

					<ul>

						<li class="feed"><a href="<?php bp_sitewide_activity_feed_link(); ?>" title="<?php esc_attr_e( 'RSS Feed', 'bp-default' ); ?>"><?php _e( 'RSS', 'bp-default' ); ?></a></li>

						<?php do_action( 'bp_activity_syndication_options' ); ?>

						<li id="activity-filter-select" class="last">

							<label for="activity-filter-by"><?php _e( 'Show:', 'bp-default' ); ?></label>

							<select id="activity-filter-by">

								<option value="-1"><?php _e( '&mdash; Everything &mdash;', 'bp-default' ); ?></option>
								<option value="activity_update"><?php _e( 'Updates', 'bp-default' ); ?></option>

								<?php if ( bp_is_active( 'blogs' ) ) : ?>

									<option value="new_blog_post"><?php _e( 'Posts', 'bp-default' ); ?></option>
									<option value="new_blog_comment"><?php _e( 'Comments', 'bp-default' ); ?></option>

								<?php endif; ?>

								<?php if ( bp_is_active( 'forums' ) ) : ?>

									<option value="new_forum_topic"><?php _e( 'Forum Topics', 'bp-default' ); ?></option>
									<option value="new_forum_post"><?php _e( 'Forum Replies', 'bp-default' ); ?></option>

								<?php endif; ?>

								<?php if ( bp_is_active( 'groups' ) ) : ?>

									<option value="created_group"><?php _e( 'New Groups', 'bp-default' ); ?></option>
									<option value="joined_group"><?php _e( 'Group Memberships', 'bp-default' ); ?></option>

								<?php endif; ?>

								<?php if ( bp_is_active( 'friends' ) ) : ?>

									<option value="friendship_accepted,friendship_created"><?php _e( 'Friendships', 'bp-default' ); ?></option>

								<?php endif; ?>

								<option value="new_member"><?php _e( 'New Members', 'bp-default' ); ?></option>

								<?php do_action( 'bp_activity_filter_options' ); ?>

							</select>
						</li>
					</ul>
				</div><!-- .item-list-tabs -->

				<?php do_action( 'bp_before_directory_activity_list' ); ?>

				<div class="activity" role="main">

					<?php locate_template( array( 'activity/activity-loop.php' ), true ); ?>

				</div><!-- .activity -->

				<?php do_action( 'bp_after_directory_activity_list' ); ?>

				<?php do_action( 'bp_directory_activity_content' ); ?>

				<?php do_action( 'bp_after_directory_activity_content' ); ?>

				<?php do_action( 'bp_after_directory_activity' ); ?>

			</div><!-- .padder -->
		</div><!-- #content -->

	<?php do_action( 'bp_after_directory_activity_page' ); ?>

	<?php get_sidebar( 'buddypress' ); ?>

<?php get_footer( 'buddypress' ); ?>
