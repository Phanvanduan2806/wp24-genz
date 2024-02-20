<?php
add_shortcode('c_menu', function () {

    $slug = 'home';
    if (is_category()) {
        $category = get_queried_object();
        $slug = $category->slug;
    }
    $class[$slug] = 'c-menu-current';
    $html = <<<EOF
[ux_menu divider="solid"]

[ux_menu_link text="Trang chủ" link="/" class="{$class['home']} "]

[ux_menu_link text="Game bài" link="/category/game-bai/" class="{$class['game-bai']}"]

[ux_menu_link text="Slot" link="/category/slot/" class="{$class['slot']}"]

[ux_menu_link text="Live casino" link="/category/live-casino/" class="{$class['live-casino']}"]

[ux_menu_link text="Quay số" link="/category/quay-so/" class="{$class['quay-so']}"]

[ux_menu_link text="Thể thao" link="/category/the-thao/" class="{$class['the-thao']}"]

[ux_menu_link text="Khuyến mãi" link="/category/khuyen-mai/" class="{$class['khuyen-mai']}"]

[ux_menu_link text="Hướng dẫn" link="/category/huong-dan/" class="{$class['huong-dan']}"]

[ux_menu_link text="Kinh nghiệm" link="/category/kinh-nghiem/" class="{$class['kinh-nghiem']}"]
[/ux_menu]
EOF;
    return do_shortcode($html);
});