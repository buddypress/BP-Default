<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, tag.php for Tag archives, 
 * category.php for Category archives, and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuddyPress 
 * @subpackage BP_Default
 */

get_header(); ?>

		<div id="content">
			<div class="padder">

			<?php do_action( 'bp_before_archive' ); ?>

				<div class="page" id="blog-archives" role="main">

					<h3 class="pagetitle"><?php printf( __( 'You are browsing the archive for %1$s.', 'bp-default' ), wp_title( false, false ) ); ?></h3>

					<?php if ( have_posts() ) : ?>

						<?php bp_dtheme_content_nav( 'nav-above' ); ?>

						<?php while (have_posts()) : the_post(); ?>

						<?php do_action( 'bp_before_blog_post' ); ?>

						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<div class="author-box">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), '50' ); ?>

								<?php if ( function_exists( 'bp_is_active' ) ) { ?>
									<p><?php printf( _x( 'by %s', 'Post written by...', 'bp-default' ), bp_core_get_userlink( $post->post_author ) ); ?></p>
								<?php } else { ?>
									<p><?php printf( _x( 'by %s', 'Post written by...', 'bp-default' ), the_author_posts_link() ); ?></p>
								<?php } ?>
							</div><!-- .author-box -->

							<div class="post-content">
								<h2 class="posttitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr_e( 'Permanent Link to', 'bp-default' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

								<p class="date"><?php printf( __( '%1$s <span>in %2$s</span>', 'bp-default' ), get_the_date(), get_the_category_list( ', ' ) ); ?></p>

								<div class="entry">
									<?php the_content( __( 'Read the rest of this entry &rarr;', 'bp-default' ) ); ?>
									<?php wp_link_pages( array( 'before' => '<div class="page-link"><p>' . __( 'Pages: ', 'bp-default' ), 'after' => '</p></div>', 'next_or_number' => 'number' ) ); ?>
								</div><!-- .entry -->

								<p class="postmetadata"><?php the_tags( '<span class="tags">' . __( 'Tags: ', 'bp-default' ), ', ', '</span>' ); ?> <span class="comments"><?php comments_popup_link( __( 'No Comments &#187;', 'bp-default' ), __( '1 Comment &#187;', 'bp-default' ), __( '% Comments &#187;', 'bp-default' ) ); ?></span></p>
							</div><!-- .post-content -->

						</div><!-- #post-the_ID() -->

						<?php do_action( 'bp_after_blog_post' ); ?>

						<?php endwhile; ?>

						<?php bp_dtheme_content_nav( 'nav-below' ); ?>

					<?php else : ?>

						<h2 class="center"><?php _e( 'Not Found', 'bp-default' ); ?></h2>
						<?php get_search_form(); ?>

					<?php endif; ?>

				</div><!-- .page -->

				<?php do_action( 'bp_after_archive' ); ?>

			</div><!-- .padder -->
		</div><!-- #content -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>