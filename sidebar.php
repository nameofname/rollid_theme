<ul id="sidebar">
    <?php

    global $wp_query;
    $curr_id = $wp_query->post->ID;

    $pages_arr = get_pages(	array('sort_column' => 'menu_order'));

    foreach($pages_arr as $key=>$page) {
        $name = $page->post_title;
        $link = get_page_link($page->ID);
        $page_id = $page->ID;

        if ($curr_id === $page_id) {
            echo "<li><a class='active' href='$link'>$name</a><br /></li>";
        } else {
            echo "<li><a href='$link'>$name</a><br /></li>";
        }

    }

    ?>
</ul>
