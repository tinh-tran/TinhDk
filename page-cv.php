<?php get_header();
/*
Template Name:  CV
*/ ?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="text-center m-auto">
				<div class="cv1">Hi,</div>
				<div class="cv2">I'm
					<span class="cv2-name">Trần Lục Long Tính</span>
				</div>
				<div class="cv3">This is my CV.</div>
				<div class="cv4">
					<i class="fa fa-2x fa-angle-down" aria-hidden="true"></i>
				</div>

				<div class="loader">Loading...</div>
				<div id="cv-main" style="display: none">
					<img class="cv-img-shadow" src="<?php bloginfo('template_url'); ?>/img/CVTranLucLongTinh.png" />
				</div>

				<a href="<?php bloginfo('template_url'); ?>/img/CVTranLucLongTinh.pdf" class="btn btn-outline-primary btn-dl-cv">
					<strong>DOWNLOAD .PDF (239 KB)</strong>
					<i class="fa fa-download" aria-hidden="true"></i>
				</a>
				<hr class="cv-divide" />
				<div class="cv-thank">Thank you!</div>

			</div>
		</main>
		<!-- #main -->
	</div>
	<!-- #primary -->
</div>
<?php
get_footer();