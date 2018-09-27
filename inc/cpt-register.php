<?php 
$portfolio = new CPT(
	array(
		'post_type_name' => 'portfolio',
		'singular' => 'Portfolio',
		'plural' => 'Portfolio',
		'slug' => 'portfolio'
		),
	array(
		'supports' => array('title', 'editor', 'thumbnail'),
		'menu_icon' => 'dashicons-playlist-audio',
		)
	);
?>