<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BS4WP
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="card card-post mb-5 posts-home">
		<div class="card-block">
			<div class="row no-gutters">
				<div class="col-12 col-md-3">
					<div class="thumb mb-3 mb-md-0">
						<a href="<?php the_permalink() ?>" style="background:url(<?php the_post_thumbnail_url( 'full' ) ?>)no-repeat center center; display: block; height:100% ;background-size:cover" class="thumb-hover">
							<span class="thumb-overlay"></span>
						</a>
					</div>
				</div>

				<div class="col-12 col-md-9 pl-md-3">
					<header class="entry-header">
						<?php
						the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
						?>
					</header>
					<!-- .entry-header -->

					<div class="entry-meta">
						<?php if ('post' === get_post_type()) : bs_4_wp_posted_on(); endif; ?>
					</div>
					<!-- .entry-meta -->

					<div class="entry-content mt-3">
                        <?php echo the_excerpt(); ?>
                        <?php echo '<a class="more-link" href="' . get_permalink($post->ID) . '"> ... <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>' ?>
					</div>
					<!-- .entry-content -->

					<?php if (is_single()) : ?>
						<footer class="entry-footer">
							<?php bs_4_wp_entry_footer(); ?>
						</footer>
						<!-- .entry-footer -->
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>

</article>
<!-- #post-## -->