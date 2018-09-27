<?php 
function new_excerpt_more($more) {
	global $post;
	return '<a class="more-link" href="' . get_permalink($post->ID) . '"> ... <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function et_excerpt_length($length) {
    return 35;
}
add_filter('excerpt_length', 'et_excerpt_length');

?>