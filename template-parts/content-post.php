<?php
/**
 * Template part for displaying specific posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BS4WP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="card card-post mb-5">
		<div class="card-block">
			<div class="arrow"></div>
			<h4 class="card-title ml-1">
				<?php the_title('<span class="entry-title entry-title-inside">', '</span>'); ?>
				<span class="entry-meta">
					<?php bs_4_wp_posted_on(); ?>
				</span>
			</h4>
			<p class="card-text">
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<!-- .entry-content -->
			</p>
			<p class="card-text">
				<footer class="entry-footer">
					<?php bs_4_wp_entry_footer(); ?>
				</footer>
				<!-- .entry-footer -->
			</p>
		</div>
	</div>
</article>
<!-- #post-## -->