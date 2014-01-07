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

<a class='tweet_link' href="https://twitter.com/dvegabooks">
    <i class="fa fa-twitter fa-3x"></i><div class="tweet"><?php echo $tweet; ?></div>
</a> 
