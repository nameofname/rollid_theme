<div id="sidebar">

    <ul id="sidebar-nav">
        <?php

        // Page links:
        echo wp_list_pages('title_li=&depth=1');

        ?>
    </ul>

    <?php

    // If this is not the home page, then add the last tweet:
    if (!is_page('home')) {

        include_once(THEME_ROOT . '/inc/last_tweet.php');

        echo '<br />';

        include(THEME_ROOT . '/inc/twitter_follow.php');

        include(THEME_ROOT . '/inc/sidebar_posts.php');

    }

    ?>

</div>
