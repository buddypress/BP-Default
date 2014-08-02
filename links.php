<?php
/**
 * Template Name: Links
 *
 * @package BuddyPress
 * @subpackage BP_Default
 */

get_header(); ?>

		<div id="content">
			<div class="padder">

			<?php do_action( 'bp_before_blog_links' ); ?>

				<div class="page" id="blog-latest" role="main">

					<h2 class="pagetitle"><?php _e( 'Links', 'bp-default' ); ?></h2>

					<ul id="links-list">
						<?php wp_list_bookmarks(); ?>
					</ul>

				</div><!-- .page -->

			<?php do_action( 'bp_after_blog_links' ); ?>

			</div><!-- .padder -->
		</div><!-- #content -->

<?php get_footer(); ?>