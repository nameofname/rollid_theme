<?php

//$page=get_page_by_title($page_name);

//die(json_encode($wp_query));

//die(json_encode(get_the_ID()));

?>
<ul id="sidebar">
    <?php

    global $wp_query;
    $curr_id = $wp_query->query_vars['page_id'];

    $pages_arr = get_pages(	array('sort_column' => 'menu_order'));

    foreach($pages_arr as $key=>$page) {
        $name = $page->post_title;
        $link = get_page_link($page->ID);
        $page_id = $page->ID;

        // If the name is "home" - then switch it to a home icon
        $name = ($name === 'home') ? "<i class='fa fa-home'></i>" : $name;

        if ($curr_id === $page_id) {
            echo "<li><a class='active' href='$link'>$name</a><br /></li>";
        } else {
            echo "<li><a href='$link'>$name</a><br /></li>";
        }

    }

    ?>
</ul>
