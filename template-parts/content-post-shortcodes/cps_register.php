<?php
function renderHTML($page)
{
    ob_start();
    get_template_part('template-parts/content-post-shortcodes/' . $page, get_post_format());
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}

// https://tatviquyen.name.vn/showcase-web-projects-thoi-sinh-vien/
function portfolio_university()
{
    return renderHTML('portfolio-university');
}
add_shortcode('portfolio_university', 'portfolio_university');

// https://tatviquyen.name.vn/chom-sao-cua-tui/
function chom_sao_cua_tui()
{
    return renderHTML('chom-sao-cua-tui');
}
add_shortcode('chom_sao_cua_tui', 'chom_sao_cua_tui');

// https://tatviquyen.name.vn/get-link-zingtv/
function get_link_zingtv()
{
    return renderHTML('get-link-zingtv');
}
add_shortcode('get_link_zingtv', 'get_link_zingtv');