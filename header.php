<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BS4WP
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <?php
    $description = '';
    $keywords = '';
    if (is_home()) {
        //Thay đổi các dấu ngoặc kép dưới đây để mô tả trang chủ của bạn
        $description = get_option( 'tinhdk_description' );
        // Thay đổi nội dung của các dấu ngoặc kép dưới đây cho các từ khóa trên trang chủ của bạn
        $keywords = get_option( 'tinhdk_keywords' );
    }
    elseif (is_single()) {
        $description1 = get_post_meta($post->ID, "description", true);
        $description2 = str_replace("\n","",mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));
        // Điền vào mô tả trường tùy chỉnh hiển thị nội dung của trường tùy chỉnh, nếu không sử dụng 200 từ đầu tiên của nội dung bài viết dưới dạng mô tả
        if($description1 == '') {
            $description = $description2;
        }else{
            $description = $description1 ? $description1 : $description2;
        }
        // Điền vào từ khoá trường tùy chỉnh hiển thị nội dung của các trường tùy chỉnh, nếu không sử dụng thẻ bài viết làm từ khoá
        $keywords = get_post_meta($post->ID, "keywords", true);
        if($keywords == '') {
            $tags = wp_get_post_tags($post->ID);    
            foreach ($tags as $tag ) {        
                $keywords = $keywords . $tag->name . ", ";    
            }
            $keywords = rtrim($keywords, ', ');
        }
    }
    elseif (is_category()) {
        //Mô tả danh mục có thể là thư mục loại trừ bài viết - thể loại, sửa đổi mô tả phân loại
        $description = category_description();
        $keywords = single_cat_title('', false);
    }
    elseif (is_tag()){
        //Mô tả thẻ có thể đi đến background-article-tag, sửa đổi mô tả của thẻ
        $description = tag_description();
        $keywords = single_tag_title('', false);
    }
    elseif (is_page()) {
        $description1_page = get_post_meta($post->ID, "description", true);
        $description2_page = str_replace("\n","",mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));
        // Điền vào mô tả trường tùy chỉnh hiển thị nội dung của trường tùy chỉnh, nếu không sử dụng 200 từ đầu tiên của nội dung bài viết dưới dạng mô tả
        if($description1_page == '') {
            $description = $description2_page;
        }else{
            $description = $description1_page ? $description1_page : $description2_page;
        }
        // Tên trường tùy chỉnh là từ khóa
        $keywords = get_post_meta($post->ID, "keywords_value", true);
        if($keywords == '') {
            $keywords = get_option( 'tinhdk_keywords' );
        }
        
    }
    // Xóa không gian và thẻ HTML không cần thiết
    $description = trim(strip_tags($description));
    $keywords = trim(strip_tags($keywords));
    ?>

    <meta name="description" content="<?php echo $description; ?>" />
    <meta name="keywords" content="<?php echo $keywords; ?>" />
    <!--[if lt IE 9]><script src="//cdn.bootcss.com/html5shiv/r29/html5.js"></script><![endif]-->
    <title><?php if ( is_home() ) {
        bloginfo('name'); echo " - "; bloginfo('description');
    } elseif ( is_category() ) {
        single_cat_title(); echo " - "; bloginfo('name');
    } elseif (is_single() || is_page() ) {
        single_post_title();
    } elseif (is_search() ) {
        echo "Kết quả tìm kiếm"; echo " - "; bloginfo('name');
    } elseif (is_404() ) {
        echo 'Không tìm thấy trang!';
    } else {
        wp_title('',true);
    } ?></title>
    <?php wp_head(); ?>
</head>

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=317452532170534&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<body <?php body_class(); ?>>
<div id="page" class="site">
        <?php if(get_option( 'tinhdk_canvas_or_background' )==0) { ?>
        <canvas id="evanyou"></canvas>  
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/canvas.js"></script>
    <?php } elseif (get_option( 'tinhdk_canvas_or_background' )==1 and get_option( 'tinhdk_background' )!=null ) { ?>
    <style>
        body {
            background-image: url(<?php echo get_option( 'tinhdk_background' ); ?>);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;*/
        }
    </style>
    <?php } ?>
    <div class="cover"></div>
    <header id="masthead" class="site-header" role="banner">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded fixed-top">
            <div class="container header-bar pt-1 pt-md-0">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')) ?>" data-toggle="tooltip"
                   data-placement="bottom" data-html="true" title="back <b>home</b>">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/img/tinhdkLogo.png" class="header-logo"
                         alt="TinhDk">
                </a>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li>
                            <form class="form-inline my-2 my-lg-0 search" method="get"
                                  action="<?php echo home_url(); ?>" role="search">
                                <input id="search" class="form-control mr-sm-2" type="search" placeholder="Search..."
                                       value="<?php echo get_search_query() ?>" name="s"/>
                            </form>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbar_cate" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                        class="fas fa-stream"></i> Menu</a>
                            <div class="d-block d-lg-none">
                                <h5 class="dropdown-header"><i class="fas fa-hdd"></i> CATEGORIES</h5>
                                <a class="dropdown-item d-flex justify-content-between align-items-center"
                                   href="<?php echo home_url('/') . 'blogging' ?>">Blogging <span
                                            class="badge badge-blogging"><?php echo get_category(3)->count; ?></span></a>
                                <a class="dropdown-item d-flex justify-content-between align-items-center"
                                   href="<?php echo home_url('/') . 'sharing' ?>">Sharing <span
                                            class="badge badge-sharing"><?php echo get_category(1)->count; ?></span></a>
                                <a class="dropdown-item d-flex justify-content-between align-items-center"
                                   href="<?php echo home_url('/') . 'coding' ?>">Coding <span
                                            class="badge badge-coding"><?php echo get_category(2)->count; ?></span></a>
                                <a class="dropdown-item ml-3"
                                   href="<?php echo home_url('/') . 'coding/php' ?>"><i class="fas fa-caret-right"></i> PHP</a>
                                <a class="dropdown-item ml-3"
                                   href="<?php echo home_url('/') . 'coding/wordpress' ?>"><i class="fas fa-caret-right"></i> Wordpress</a>
                                <a class="dropdown-item ml-3"
                                   href="<?php echo home_url('/') . 'coding/laravel' ?>"><i class="fas fa-caret-right"></i> Laravel</a>
                                <div class="dropdown-divider"></div>
                            </div>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <div class="d-block d-lg-none">
                                    <h5 class="dropdown-header"><i class="fas fa-stream"></i> Menu</a></h5>
                                </div>
                                <?php wp_nav_menu(); ?>
                                <!-- <a class="dropdown-item" href="#">Coming soon...</a> -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- #masthead -->

    <div id="content" class="site-content">