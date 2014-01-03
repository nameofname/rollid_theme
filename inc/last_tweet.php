<?php

// Get the last tweet:
require('twitter_api.php');

$twitter_config = array(
    'key'=>TWITTER_KEY,
    'secret'=>TWITTER_SECRET,
);

$twitter = new Twitter_API($twitter_config);
$tweet = $twitter->get_tweet();

?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <i class="fa fa-twitter fa-3x"></i><span class="tweet"><?php echo $tweet; ?></span>
        </div>
    </div>
</div>
