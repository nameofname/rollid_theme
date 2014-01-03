    <div class="row">
        <div class="col-md-12">
            <?php

            require('twitter_api.php');

            $twitter_config = array(
                'key'=>TWITTER_KEY,
                'secret'=>TWITTER_SECRET,
            );

            $thing = new Twitter_API($twitter_config);

            $tweet = $thing->get_tweet();

            die(json_encode($tweet));

            ?>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/site.js"></script>

    <?php wp_footer(); ?>

</body>
</html>