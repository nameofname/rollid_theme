<?php

// IMPORTANT : I no longer fetch the last tweet before delivering the page via PHP. Now, for cacheing, I deliver the
// page, then fetch via ajax. The last tweet is always populated into the .last-tweet .tweet div. 

// Get the last tweet:
//require(THEME_ROOT . '/lib/twitter_api.php');
//
//$twitter_config = array(
//    'key'=>TWITTER_KEY,
//    'secret'=>TWITTER_SECRET,
//);
//
//$twitter = new Twitter_API($twitter_config);
//$tweet = $twitter->get_tweet();

?>

    <div class='last-tweet'>
        <div class="last-tweet-left">
            <a target="_blank" href="https://twitter.com/dvegabooks">
                <i class="fa fa-twitter fa-3x"></i>
            </a>
        </div>
        <div class="last-tweet-right">
            <a target="_blank" href="https://twitter.com/dvegabooks">
                <div class="tweet"></div>
                <?php include(THEME_ROOT . '/inc/twitter_follow.php'); ?>
            </a>
        </div>
    </div>
