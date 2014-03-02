<div id="sidebar">

        <?php

        if (!is_page('home')) {
            echo '<ul id="sidebar-nav">';
        } else {
            echo '<ul id="sidebar-nav">';
        }


        // Page links:
        echo wp_list_pages('title_li=&depth=1');

        ?>
    </ul>

    <?php

    // If this is not the home page, then add the last tweet:
    if (!is_page('home')) {

        include_once(THEME_ROOT . '/inc/last_tweet.php');

        include(THEME_ROOT . '/inc/sidebar_posts.php');

    }

    ?>

</div>
