<?php
/**
 * Template part for displaying results in search pages
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
						<a href="<?php the_permalink() ?>" style="background:url(<?php the_post_thumbnail_url( 'medium' ) ?>)no-repeat center center; display: block; height:100% ;background-size:cover" class="thumb-hover">
							<span class="thumb-overlay"></span>
						</a>
					</div>
				</div>

				<div class="col-12 col-md-9 pl-md-3">
					<h4 class="card-title">
						<header class="entry-header">
							<?php
							the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
							?>
						</header>
						<!-- .entry-header -->
					</h4>
					<h6 class="card-subtitle mb-2 text-muted">
						<?php
						if ('post' === get_post_type()) : ?>
						<div class="entry-meta">
							<?php bs_4_wp_posted_on(); ?>
						</div>
						<!-- .entry-meta -->
						<?php
						endif; ?>
					</h6>

					<p class="card-text">
						<div class="entry-content">
							<?php the_excerpt(); ?>
						</div>
						<!-- .entry-content -->
					</p>
					<?php if (is_single()) : ?>
						<p class="card-text">
							<footer class="entry-footer">
								<?php bs_4_wp_entry_footer(); ?>
							</footer>
							<!-- .entry-footer -->
						</p>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>

</article>
<!-- #post-## -->
