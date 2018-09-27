<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package BS4WP
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<section id="primary" class="content-area col-12">
			<main id="main" class="site-main" role="main">

				<?php
				if ( have_posts() ) : ?>

				<header class="page-header">
					<h3 class="text-muted">
						<?php printf( _x( '<i class="fa fa-search" aria-hidden="true"></i> Searching: <b>%s</b>', 'bs-4-wp' ), '<span class="text-info">' . get_search_query() . '</span>' ); ?>
					</h3>
				</header>
				<!-- .page-header -->
				<hr/>

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content-search', get_post_format() );

			endwhile;

			wp_bs_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main>
		<!-- #main -->
	</section>
	<!-- #primary -->
</div>
<!-- end .container-->
<?php
get_footer();