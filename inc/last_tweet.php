<?php

// Get the last tweet:
require(THEME_ROOT . '/lib/twitter_api.php');

$twitter_config = array(
    'key'=>TWITTER_KEY,
    'secret'=>TWITTER_SECRET,
);

$twitter = new Twitter_API($twitter_config);
$tweet = $twitter->get_tweet();

?>

<i class="fa fa-twitter fa-3x"></i><span class="tweet"><?php echo $tweet; ?></span>
