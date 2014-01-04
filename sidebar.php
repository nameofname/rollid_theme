<ul id="sidebar">
    <?php

    // Page links:
    echo wp_list_pages('title_li=&depth=1');

    // If this is not the home page, then add the last tweet:
    if (!is_page('home')) {
        include_once('inc/last_tweet.php');
    }

    ?>
</ul>
