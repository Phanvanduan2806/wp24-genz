<?php
require_once 'includes/rest-api/index.php';
require_once 'includes/shortcodes/index.php';
define("WP_FLATSOME_ASSET_VERSION", time());

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap',
        [],
        WP_FLATSOME_ASSET_VERSION
    );
    wp_enqueue_style('c-global-css', get_stylesheet_directory_uri() . '/assets/css/c-global.css', [], WP_FLATSOME_ASSET_VERSION);
    wp_enqueue_style('c-home-css', get_stylesheet_directory_uri() . '/assets/css/c-home.css', [], WP_FLATSOME_ASSET_VERSION);
    wp_enqueue_style('c-devlin-css', get_stylesheet_directory_uri() . '/assets/css/c-devlin.css', [], WP_FLATSOME_ASSET_VERSION);
    wp_enqueue_style('c-cate-2-css', get_stylesheet_directory_uri() . '/assets/css/c-cate-2.css', [], WP_FLATSOME_ASSET_VERSION);

    wp_enqueue_style('c-media-queries-css', get_stylesheet_directory_uri() . '/assets/css/c-media-queries.css', [], WP_FLATSOME_ASSET_VERSION);
    wp_enqueue_style('c-media-devlin-css', get_stylesheet_directory_uri() . '/assets/css/c-media-devlin.css', [], WP_FLATSOME_ASSET_VERSION);

}, 999);

add_action('wp_footer', function () {

    wp_enqueue_script('c-home-js', get_stylesheet_directory_uri() . '/assets/js/c-home.js', [], WP_FLATSOME_ASSET_VERSION);
    wp_enqueue_script('c-devlin-js', get_stylesheet_directory_uri() . '/assets/js/c-devlin.js', [], WP_FLATSOME_ASSET_VERSION);

});


// Disable Comments on ALL post types
add_action('admin_init', function () {
    $types = get_post_types();
    foreach ($types as $type) {
        if (post_type_supports($type, 'comments')) {
            remove_post_type_support($type, 'comments');
            remove_post_type_support($type, 'trackbacks');
        }
    }
});

function disable_comments_status()
{
    return false;
}
add_filter('comments_open', 'disable_comments_status', 20, 2);
add_filter('pings_open', 'disable_comments_status', 20, 2);
