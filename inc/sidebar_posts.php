<?php

$sidebar_posts = get_sidebar_posts();
foreach ($sidebar_posts as $post) {
    $title = $post->post_title;
    $id = $post->ID;
    echo "<a href='/?p=$id'>$title</a>";
}

