<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package BS4WP
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div id="primary" class="content-area col-12 col-md-12 col-lg-12 col-xl-12">
				<main id="main" class="site-main" role="main">
					<section class="error-404 not-found mb-4">
						<h1 class="text-danger">404</h1>
						<h3>
							< PAGE NOT FOUND />
						</h3>
						<img class="mx-auto d-block" src="http://i.imgur.com/ZeHuAoq.png" />
					</section>
					<!-- .error-404 -->
				</main>
				<!-- #main -->
			</div>
			<!-- #primary -->
		</div>
		<!-- end .row-->
	</div>
	<!-- end container-->
	<?php
get_footer();