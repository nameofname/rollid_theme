<?php

// Define some constants needed to run a page independend of wordpress:
define(THEME_ROOT, realpath(__DIR__ . '/..'));
define(WP_ROOT, realpath(__DIR__ . '/../../../..'));

require(WP_ROOT.'/wp-config.php');
require(THEME_ROOT.'/lib/twitter_api.php');

$twitter = new Twitter_API(array(
    'key'=>TWITTER_KEY,
    'secret'=>TWITTER_SECRET,
));
$tweet = $twitter->get_tweet();
$arr = array(
    'text'=>$tweet
);

die(json_encode($arr));
