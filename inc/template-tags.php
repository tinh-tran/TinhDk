<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package BS4WP
 */

if ( ! function_exists( 'bs_4_wp_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function bs_4_wp_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'bs-4-wp' ),
		'<img src="' . get_avatar_url( get_the_author_meta( 'ID' ) ) . '" alt="' . get_the_author_meta( 'name' ) . '" class="rounded-circle" width="24px"> ' . '<span class="url fn n">' . esc_html( get_the_author() ) . '</span>'
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'bs-4-wp' ), $time_string );

	echo $posted_on; // WPCS: XSS OK.

	// Hide category and tag text for pages.
	// (more than 2 categories)
	/*if ( 'post' === get_post_type() ) {
		// translators: used between list items, there is a space after the comma
		$categories_list = get_the_category_list( esc_html__( ', ', 'bs-4-wp' ) );
		if ( $categories_list && bs_4_wp_categorized_blog() ) {
			printf( ' • ' . _x( 'Published in %1$s', 'bs-4-wp' ), $categories_list ); // WPCS: XSS OK.
		}
	}*/

	echo ' • ' . '<a class="category-highlight" href="' . esc_url( home_url('/') . get_the_category( $post->ID )[0]->slug ) . '">' . get_the_category( $post->ID )[0]->name . '</a>';

	/*if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<h5><span class="badge badge-meta-2 comments-link"><i class="fa fa-terminal" aria-hidden="true"></i> ';
		/* translators: %s: post title 
		comments_popup_link( sprintf( wp_kses( __( 'Comment', 'bs-4-wp' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span></h5>';
	}*/

	if ( !is_home() && 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'bs-4-wp' ) );
		if ( $tags_list ) {
			echo ' • <i class="fas fa-tags"></i> ';
			printf( '<span class="tags-links">' . esc_html__( '%1$s', 'bs-4-wp' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
	
}
endif;

if ( ! function_exists( 'bs_4_wp_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function bs_4_wp_entry_footer() {
	echo related_post();
	if(function_exists('tvqzone_PostViews'))
	{  
		echo '<div class="tvqzone-post-views">' . tvqzone_PostViews(get_the_ID()) . ' <i class="far fa-heart"></i></div>';
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function bs_4_wp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'bs_4_wp_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'bs_4_wp_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so bs_4_wp_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so bs_4_wp_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in bs_4_wp_categorized_blog.
 */
function bs_4_wp_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'bs_4_wp_categories' );
}
add_action( 'edit_category', 'bs_4_wp_category_transient_flusher' );
add_action( 'save_post',     'bs_4_wp_category_transient_flusher' );
