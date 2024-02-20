<?php
/**
 * The blog template file.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

get_header();

?>

<div id="content" class="blog-wrapper blog-single page-wrapper">
    <?php
    if (have_posts()) {
        the_post();
        $title = get_the_title();
        $content = get_the_content();

        // Lấy thông tin về người đăng
        $author_id = get_the_author_meta('ID');
        $author_name = get_the_author();
        $author_avatar = get_avatar($author_id, 32); // 32 là kích thước ảnh đại diện
    
        // Lấy ngày đăng bài
        $post_date = get_the_date();

        // Lấy số lượng comment
        $comment_count = get_comments_number();
        // Lấy danh sách comment
        $comments = get_comments();
        
        // Lấy danh sách các tag của bài viết
        $tags = get_the_tags();
        $tag_names = array();

        if ($tags) {
            foreach ($tags as $tag) {
                $tag_names[] = $tag->name;
            }
        }
    }

    // Tạo một mảng để chứa thông tin về các "Animal"
    $animals = array(
        array('link' => '/', 'text' => 'Animal 1'),
        array('link' => '/', 'text' => 'Animal 2'),
        array('link' => '/', 'text' => 'Animal 3'),
        array('link' => '/', 'text' => 'Animal 4')
    );

    // Start the output buffer to capture HTML content
    ob_start();
    ?>

    [section label="c-single" class="c-single"]

    [row style="small"]

    [col span__sm="12" align="left"]

    [ux_html]

    [c_breadcrumb]
    [/ux_html]

    [/col]

    [/row]
    [row]

    [col span__sm="12"]

    [ux_html]

    <h1><?php echo $title; ?></h1>
    [/ux_html]

    [/col]
    [col span="8" span__sm="12"]

    [ux_html]

    <div class="single_auth">
    <?php echo $author_avatar; ?>
    <div>
    <h4><?php echo $author_name; ?></h4>
    <p><?php echo $post_date; ?></p>

    </div>
    </div>
    [/ux_html]

    [/col]
    [col span="4" span__sm="12"]

    [follow title="Chia sẻ" style="small" facebook="/" twitter="/" linkedin="/"]


    [/col]

    [/row]
    [row label="single_popular" class="single_popular"]

    [col span="8" span__sm="12" span__md="7"]

    [ux_html]

    <?php echo $content; ?>
    [/ux_html]
    [divider width="100%" height="1px" color="rgb(170, 167, 167)"]

    [ux_stack]

    <?php
    foreach ($tag_names as $tag_name) {
        echo "[featured_box link='/']";
        echo "<p>{$tag_name}</p>";
        echo "[/featured_box]";
    }
    ?>

    [/ux_stack]

    [/col]
    [col span="4" span__sm="12" span__md="5" visibility="hide-for-small"]

    [block id="97"]

    [/col]

    [/row]

    [/section]

    <?php
    // End the output buffer and assign it to $result
    $result = ob_get_clean();

    // Output the result
    echo do_shortcode($result);
    ?>

</div>

<?php get_footer(); ?>
