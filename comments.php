<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BS4WP
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div class="text-center">
	<h6 class="share-text"><b>Share on Facebook</b></h6>
	<div class="fb-like" data-href="<?php the_permalink() ?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
	<div class="fb-save" data-uri="<?php the_permalink() ?>" data-size="large"></div>
	<br/>
	<hr width="20%" />
	<span class="fa-stack fa-lg">
		<i class="fa fa-circle fa-stack-2x"></i>
		<i class="fa fa-comments fa-stack-1x fa-inverse"></i>
	</span>
</div>
<div id="comments" class="comments-area">
	<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5" width="100%"></div>
</div>
<!-- #comments -->