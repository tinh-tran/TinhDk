<?php
/**
 * BS4WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BS4WP
 */

if (! function_exists('bs_4_wp_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bs_4_wp_setup()
{
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on BS4WP, use a find and replace
     * to change 'bs-4-wp' to the name of your theme in all the template files.
     */

    register_nav_menus( array(
    'primary' => 'Navigation principal',
    ) );
    get_template_part('inc/Walker_Nav_Menu');
    // Hide admin bar
    add_filter('show_admin_bar', '__return_false');

    load_theme_textdomain('bs-4-wp', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('bs_4_wp_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    )));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
}
endif;
add_action('after_setup_theme', 'bs_4_wp_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bs_4_wp_content_width()
{
    $GLOBALS['content_width'] = apply_filters('bs_4_wp_content_width', 640);
}
add_action('after_setup_theme', 'bs_4_wp_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bs_4_wp_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar Home', 'bs-4-wp'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'bs-4-wp'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Sidebar Post', 'bs-4-wp'),
        'id'            => 'sidebar-post',
        'description'   => esc_html__('Add widgets here.', 'bs-4-wp'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'bs_4_wp_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function bs_4_wp_scripts()
{
    /* Fonts */
    wp_enqueue_style('GoogleFonts', 'https://fonts.googleapis.com/css?family=Nunito:400,700,900|Encode+Sans:700', false);
    wp_enqueue_style('FontAwesome', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css', false);

    /* Tether.io */
    wp_enqueue_style('tether-style', get_template_directory_uri() . '/vendor/bootstrap/tether.min.css', array(), '1.3.3', 'all');
    wp_enqueue_script('tether-js', get_template_directory_uri() . '/vendor/bootstrap/tether.min.js', array(), '1.3.3', true);

    /* Bootstrap v4.0.0-alpha.6 (do not update) */
    wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/vendor/bootstrap/bootstrap.min.css', array(), 'v4.0.0-alpha.6', 'all');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/vendor/bootstrap/bootstrap.min.js', array('jquery'), 'v4.0.0-alpha.6', true);

    /* APlayer */
    wp_enqueue_style('aplayer-style', get_template_directory_uri() . '/vendor/APlayer/APlayer.css');
    wp_enqueue_script('aplayer-js', get_template_directory_uri() . '/vendor/APlayer/APlayer.min.js', array('jquery'), true);

    /* Ekko Lightbox */
    wp_enqueue_style('elb-style', get_template_directory_uri() . '/vendor/ekko-lightbox/ekko-lightbox.css');
    wp_enqueue_script('elb-js', get_template_directory_uri() . '/vendor/ekko-lightbox/ekko-lightbox.min.js', array('jquery'), true);

    /* Animate.css */
    wp_enqueue_style('animate-style', get_template_directory_uri() . '/vendor/animate.css/animate.css', array(), '3.5.2', 'all');

    /* Customize css & js */
    wp_enqueue_style('bs-4-wp-style', get_stylesheet_uri());
    wp_enqueue_script('like-js', get_template_directory_uri() . '/js/like.js', array(), true);
    //wp_enqueue_script('like', get_template_directory_uri() . '/js/like.js', array('like'), null, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'bs_4_wp_scripts');

// Remove jquery migrate console
add_action('wp_default_scripts', function ($scripts) {
    if (! empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, array( 'jquery-migrate' ));
    }
});

/**
* Js for old browser
*/
if (!function_exists('ie_scripts')) {
    function ie_scripts()
    {
        echo '<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->';
        echo '<!-- WARNING: Respond.js doesn\'t work if you view the page via file:// --> ';
        echo '<!--[if lt IE 9]>';
        echo '<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>';
        echo '<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
        echo '<![endif]-->';
    }
    add_action('wp_head', 'ie_scripts');
}

/**
* Custom template tags for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';

/**
* Load Jetpack compatibility file.
*/
require get_template_directory() . '/inc/jetpack.php';

/**
* Replaces the excerpt "Read More" text by a link
*/
require get_template_directory() . '/inc/read-more.php';

/**
* Bootstrap pagination function
*/
require get_template_directory() . '/inc/bootstrap-pagination.php';

// Remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js($src)
{
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('style_loader_src', 'vc_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'vc_remove_wp_ver_css_js', 9999);

// Remove default image sizes here.
add_filter('intermediate_image_sizes_advanced', 'prefix_remove_default_images');
function prefix_remove_default_images($sizes)
{
    unset($sizes['thumbnail']); // 150px
    unset($sizes['medium']); // 300px
    unset($sizes['large']); // 1024px
    unset($sizes['medium_large']); // 768px
    return $sizes;
}

// Register custom post type (CPT) - not necessary for now
// require get_template_directory() . '/inc/CPT.php';
// require get_template_directory() . '/inc/cpt-register.php';
// flush_rewrite_rules(false); // fix page not found (custom post type)

// Tvqzone Post Views
require get_template_directory() . '/inc/tinhdk-post-views.php';

// Recover FB like, share, cmt since moving HTTPS
function rsssl_recover_shares($html)
{
    //replace the https url back to http
    //$html = str_replace('property="og:url" content="https://tatviquyen.name.vn', 'property="og:url" content="tatviquyen.name.vn', $html);
    $html = str_replace('data-href="https://tinhdk.net', 'data-href="http://tinhdk.net', $html);
    return $html;
}
add_filter("rsssl_fixer_output", "rsssl_recover_shares");

// Register content post shortcode
require get_template_directory() . '/template-parts/content-post-shortcodes/cps_register.php';

// Shortcode: TVQzone label
function TinhDk_label()
{
    return '<img class="sticker tvqzone-label" src="' . get_stylesheet_directory_uri() . '/img/Tinhdklogo.png" alt="TinhDk">';
}
add_shortcode('tinhdk', 'TinhDk_label');

// Shortcode: Download w 123link
function Download123Link( $atts )
{
    $link = $atts['link'];
    $title = $atts['title'];
    $html = '<a href="'. $link .'" target="blank" class="btn btn-outline-primary btn-download" title="'. $title.'"><i class="fas fa-download"></i> | <strong>'. $title .'</strong></a>';
    return $html;
}
add_shortcode('download', 'Download123Link');


define('functions', TEMPLATEPATH.'/functions');
IncludeAll( functions );
function IncludeAll($dir){
    $dir = realpath($dir);
    if($dir){
        $files = scandir($dir);
        sort($files);
        foreach($files as $file){
            if($file == '.' || $file == '..'){
                continue;
            }elseif(preg_match('/.php$/i', $file)){
                include_once $dir.'/'.$file;
            }
        }
    }
}
// Do you like me?
function TinhDk_doyoulikeme() {
    $sql_1="CREATE TABLE IF NOT EXISTS `votes` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
        `likes` int(10) NOT NULL DEFAULT '0',
        PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
    $sql_3="CREATE TABLE IF NOT EXISTS `votes_ip` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
        `vid` int(10) NOT NULL,
        `ip` varchar(40) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql_1);
    $rows_affected = $wpdb->insert( 'votes', array( 'id' => 1, 'likes' => 0 ));
    dbDelta($sql_3);
}
add_action( 'init', 'TinhDk_doyoulikeme' );

// Thêm bảng mô tả Mô tả và Từ khoá tùy chỉnh
$new_meta_boxes = array(
    "description" => array(
        "name" => "_description",
        "std" => "",
        "title" => "Mô tả trang Web:"
    ),
    "keywords" => array(
        "name" => "_keywords",
        "std" => "",
        "title" => "Từ khoá:"
    )
);
function new_meta_boxes() {
    global $post, $new_meta_boxes;
    foreach($new_meta_boxes as $meta_box) {
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
        // Tiêu đề trường tùy chỉnh
        echo'<h3>'.$meta_box['title'].'</h3>';
        // Nhập tiêu đề tuỳ chỉnh
        echo '<textarea cols="60" rows="3" style="width:100%" name="'.$meta_box['name'].'_value">'.$meta_box_value.'</textarea><br />';
    }
    echo '<input type="hidden" name="memory_metaboxes_nonce" id="memory_metaboxes_nonce" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
}
function create_meta_box() {
    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new-meta-boxes', 'Mô tả và từ khóa tùy chỉnh', 'new_meta_boxes', 'post', 'normal', 'high' );
    }
    add_meta_box( 'new-meta-boxes', 'Mô tả và từ khóa trang tùy chỉnh', 'new_meta_boxes', 'page', 'normal', 'high' );
}
function save_postdata( $post_id ) {
    global $new_meta_boxes;
    if ( !wp_verify_nonce( $_POST['memory_metaboxes_nonce'], plugin_basename(__FILE__) ))
        return;
    if ( !current_user_can( 'edit_posts', $post_id ))
        return;
    foreach($new_meta_boxes as $meta_box) {
        $data = $_POST[$meta_box['name'].'_value'];
        if($data == "")
            delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
        else
        update_post_meta($post_id, $meta_box['name'].'_value', $data);
    }
}
add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');


// Remove Parent Category from Child Category URL
add_filter('term_link', 'devvn_no_category_parents', 1000, 3);
function devvn_no_category_parents($url, $term, $taxonomy) {
    if($taxonomy == 'category'){
        $term_nicename = $term->slug;
        $url = trailingslashit(get_option( 'home' )) . user_trailingslashit( $term_nicename, 'category' );
    }
    return $url;
}
// Rewrite url mới
function devvn_no_category_parents_rewrite_rules($flash = false) {
    $terms = get_terms( array(
        'taxonomy' => 'category',
        'post_type' => 'post',
        'hide_empty' => false,
    ));
    if($terms && !is_wp_error($terms)){
        foreach ($terms as $term){
            $term_slug = $term->slug;
            add_rewrite_rule($term_slug.'/?$', 'index.php?category_name='.$term_slug,'top');
            add_rewrite_rule($term_slug.'/page/([0-9]{1,})/?$', 'index.php?category_name='.$term_slug.'&paged=$matches[1]','top');
            add_rewrite_rule($term_slug.'/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?category_name='.$term_slug.'&feed=$matches[1]','top');
        }
    }
    if ($flash == true)
        flush_rewrite_rules(false);
}
add_action('init', 'devvn_no_category_parents_rewrite_rules');

/*Sửa lỗi khi tạo mới category bị 404*/
function devvn_new_category_edit_success() {
    devvn_no_category_parents_rewrite_rules(true);
}
add_action('created_category','devvn_new_category_edit_success');
add_action('edited_category','devvn_new_category_edit_success');
add_action('delete_category','devvn_new_category_edit_success');