<?php
function tinhdk_PostViews($post_ID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($post_ID, $count_key, true);
    if ($count == '') {
        $count = 1;
        delete_post_meta($post_ID, $count_key);
        add_post_meta($post_ID, $count_key, '1');
        return $count . ' views';
    } else {
        $count++;
        update_post_meta($post_ID, $count_key, $count);
        return '<strong>' . number_format($count) . '</strong> views';
    }
}

function top10_post()
{
    global $wpdb;
    $sql = "SELECT post_id, meta_value FROM wp_postmeta WHERE meta_key = 'post_views_count' ORDER BY CAST(meta_value AS UNSIGNED) DESC LIMIT 0,10";
    $results = $wpdb->get_results($sql, OBJECT);
    echo '<div class="top-posts-list">';
    foreach ($results as $post) {
        echo '<div class="top-post">';
        echo '<a href="' . get_permalink($post->post_id) . '">';
        echo '<div class="top-post-image" style="background:url(\'' . get_the_post_thumbnail_url($post->post_id, 'thumbnail') . '\') 50% 50% no-repeat; background-size:cover;"></div>';
        echo '<div class="top-post-title">' . get_the_title($post->post_id) . '</div>';
        echo '</a><div class="clearfix"></div></div>';
    }
    echo '</div>';
}


function random_post()
{
    $args = array(
        'post_type' => 'post',
        'orderby' => 'rand',
        'posts_per_page' => 5,
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        echo '<div class="top-post-list">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            echo '<div class="top-post">';
            echo '<a href="' . get_permalink() . '">';
            echo '<div class="top-post-image image-random-post" style="background:url(\'' . get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') . '\') 50% 50% no-repeat; background-size:cover;"></div>';
            echo '<div class="top-post-title">' . get_the_title() . '</div>';
            echo '</a><div class="clearfix"></div></div>';
        }
        /* Restore original Post Data */
        wp_reset_postdata();
    }
    echo '</div>';
}

function related_post()
{
    $orig_post = $post;
    global $post;
    $categories = get_the_category($post->ID);
    if ($categories) {
        $category_ids = array();
        foreach ($categories as $individual_category) {
            $category_ids[] = $individual_category->term_id;
        }

        $args = array(
            'category__in' => $category_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page' => 4, // Number of related posts that will be shown.
            'caller_get_posts' => 1
        );

        $my_query = new WP_Query($args);
        if ($my_query->have_posts()) {
            echo '<div class="related-post-title">Related Posts</div>';
            echo '<div class="row my-2 p-0 p-md-2 mx-auto">';
            while ($my_query->have_posts()) {
                $my_query->the_post(); ?>
                <div class="related col-6 col-md-3 p-0 px-md-2">
                    <a href="<?php the_permalink() ?>">
                        <div class="related-thumbnail"
                             style="background:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') ?>') 50% 50% no-repeat; background-size:cover;"></div>
                        <div class="related-title"><?php echo get_the_title() ?></div>
                    </a>
                </div>
                <?php
            }
            echo '</div>';
        }
    }
    $post = $orig_post;
    wp_reset_query();
}

// Show views on admin dashboard
function get_PostViews($post_ID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($post_ID, $count_key, true);
    return $count;
}

function post_column_views($newcolumn)
{
    $newcolumn['post_views'] = __('Views');
    return $newcolumn;
}

function post_custom_column_views($column_name, $id)
{
    if ($column_name === 'post_views') {
        echo get_PostViews(get_the_ID());
    }
    if (get_PostViews(get_the_ID()) == null) {
        echo '0';
    }
}

add_filter('manage_posts_columns', 'post_column_views');
add_action('manage_posts_custom_column', 'post_custom_column_views', 10, 2);

function widget_event()
{
    ?>
    <div class="border-event">
        <div class="bg-event-white">
            <div class="heading">
                <i class="fab fa-leanpub fa-3x icon-cnc"></i>
                <div class="heading-title">
                    <span>Series</span>
                    <span>Cùng Nhau Code <i class="fas fa-terminal"></i></span>
                </div>
            </div>
            <div class="subjects">
                <a href="<?php echo home_url(); ?>/coding/php"><i class="fab fa-php"></i> PHP</a>
                <a href="<?php echo home_url(); ?>/coding/wordpress"><i class="fab fa-wordpress-simple"></i> Wordpress</a>
                <a href="<?php echo home_url(); ?>/coding/laravel"><i class="fab fa-laravel"></i> Laravel</a>
            </div>

        </div>
    </div>
    <div class="ads">
        <div class="ad-title">
            <span>Ads</span>
            <span><i class="fas fa-angle-double-down" data-toggle="tooltip" data-placement="top" title="Support me by clicking on ads."></i></span>
        </div>
        <div class="ad-123link my-1">
            <!-- Start of banner code -->
            <a href="#" target="_blank"><img src="//#" title="Rút gọn link kiếm tiền online uy tín nhất Việt Nam" /></a>
            <!-- End of banner code -->
        </div>
        <div class="ad-azdigi my-1">
            <!-- Start of banner code -->
            <a href="#" target="_blank"><img src=#" title="TinhDk" /></a>
            <!-- End of banner code -->
        </div>
    </div>
    <?php
}

?>