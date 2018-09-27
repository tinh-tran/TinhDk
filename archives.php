<?php
/**
 * @package WordPress
 * @Theme TinhDk
 *
 * @author jackymon41@gmail.com
 * @link https://tinhdk.net
 */
get_header();
setPostViews(get_the_ID());
?>
<div class="container">
	<div class="d-flex align-items-center mb-1">
		<h5 class="page-title"><?php echo single_cat_title( '', false ) ?></h5>
		<div class="archive-description ml-2"><i class="fas fa-angle-right mr-1"></i> <?php echo get_the_archive_description() ?></div>
	</div>
	<div class="row">
		<div id="primary" class="content-area col-12 col-lg-8">
			<?php 
			if ( function_exists('yoast_breadcrumb') ) 
				{yoast_breadcrumb('<nav class="breadcrumb">','</nav>');}
			?>
			
			<main id="main" class="site-main" role="main">
				<?php
				if ( have_posts() ) : ?>

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			wp_bs_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main>
		<!-- #main -->
	</div>
	<!-- #primary -->
	<?php
	get_sidebar();
	get_footer();