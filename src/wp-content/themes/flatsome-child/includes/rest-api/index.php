<?php
require 'rest-api-post-urls.php';

// Config Route
function register_api_endpoints()
{
    register_rest_route('wp/v2', 'post-urls', array(
        'methods' => 'POST',
        'callback' => 'get_post_urls',
    ));
}
add_action('rest_api_init', 'register_api_endpoints');
