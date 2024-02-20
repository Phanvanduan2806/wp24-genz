<?php

function get_post_urls()
{
    $urls = $_POST['urls'];
    $results = array();
    foreach ($urls as $url) {
        $post_id = url_to_postid($url);
        $post = get_post($post_id);
        if ($post) {
            $link_vao_choi = get_field('link_vao_choi', $post_id);
            $results[] = array(
                'url' => $url,
                'link_vao_choi' => $link_vao_choi,
            );
        }
    }
    return ['data' => $results];
}
