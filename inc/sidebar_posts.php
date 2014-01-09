<?php

// Get all posts tagged with "put_in_sidebar" -- then print a link for each:
$sidebar_posts = get_sidebar_posts();
$str = "<h2>A special title that Danielle made up.</h2><ul id='sidebar_posts'>";
foreach ($sidebar_posts as $post) {
    $title = $post->post_title;
    $id = $post->ID;
    $str .= "<li><a href='/?p=$id'>$title</a></li>";
}
$str .= "<ul>";
echo $str;