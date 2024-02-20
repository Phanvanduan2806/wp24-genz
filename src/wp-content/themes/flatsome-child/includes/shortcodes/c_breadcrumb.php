<?php
add_shortcode('c_breadcrumb', function () {
    if (is_single() || is_category() || is_page()) {
        $breadcrumb_html = '<nav aria-label="Breadcrumb"><ul class="breadcrumb nav">';
        $breadcrumb_html .= '<li class="breadcrumb-item"><a href="' . get_bloginfo('url') . '">Trang chủ</a></li>';
        if (is_category()) {
            $category = get_queried_object();
            if ($category) {
                $breadcrumb_html .= '<li class="breadcrumb-item"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
            }
        }
        if (is_single()) {
            $breadcrumb_html .= '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
        }
        if (is_page()) {
            $breadcrumb_html .= '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
        }
        $breadcrumb_html .= '</ul></nav>';
        $css =<<<EOF
<style>
.breadcrumb li{margin-left: 0!important;}
.breadcrumb a{color: #2e548c !important ;font-size: 20px;}
.breadcrumb-item + .breadcrumb-item::before { content: ">";color: #2e548c !important;padding: 0 10px;}
</style>
EOF;

        return $breadcrumb_html.$css;
    }
    return '';
});

