<?php
/**
 * User: ronald
 * Date: 1/1/14
 * Time: 3:51 PM
 */

require(THEME_ROOT . '/lib/twitteroauth/twitteroauth.php');


Class Twitter_API {

    private $consumer_key = '';
    private $consumer_secret = '';
    private $oauth_token = null;
    private $oauth_token_secret = null;
    private $connection = null;
    private $screen_name = 'dvegabooks';

    // Wordpress DB var names for getting and retreiving bits of data.
    private $var_time = 'tweet_time';
    private $var_tweet = 'tweet_data';

    // Endpoints:
    private $user_timeline = 'https://api.twitter.com/1.1/statuses/user_timeline.json';


    public function __construct ($config) {

        // Set the configurable consumer key and consumer secret:
        if (!isset($config['key']) || !isset($config['secret'])) {
            throw new ErrorException('You must have a valid configuration to use the twitter api class.');
        }

        $this->consumer_key = $config['key'];
        $this->consumer_secret = $config['secret'];
    }


    /**
     * Gets the most recent tweet by danielle.
     * If the most recent tweet was fetched within the last 15 minutes, then we will get the version stored in the
     * DB - otherwise, go through twitter to get the most recent tweet.
     * @return API|mixed
     */
    public function get_tweet () {
        if (!isset($this->connection)) {
            $this->connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret);
        }

        // Set the timeout for getting the last tweet to something low. Don't want our site speed to suffer if they
        // are down / having network problems ;)
        $this->connection->connecttimeout = 5;
        $this->connection->timeout = 5;

        $curr_time = time();

        // Get the last tweet data:
        $last_tweet_data = get_option($this->var_tweet);

        // Normalize the last tweet data output to an empty string if it is not there or whatever reason:
        if (is_null($last_tweet_data) || !$last_tweet_data) {
            $last_tweet_data = '';
        }

        // Add the time option (does nothing if the option already exists):
        add_option($this->var_time, $curr_time, '', 'yes');

        // Get the time of the last successful request. If it was over 15 minutes ago, then retrieve the tweets.
        $tweet_time = get_option($this->var_time);

        if (($curr_time - $tweet_time) < 900) {
            if (!is_null($last_tweet_data)) {
                return $last_tweet_data;
            }
        }

        $params = array(
            'screen_name'=>$this->screen_name,
            'count'=>1
        );

//        echo 'accessing twitter...<br>';
        // Use the twitter Oauth plugin to get the last tweet:
        $response = $this->connection->get($this->user_timeline, $params);

        if ($response) {

            // If the response was an error, do nothing:
            $is_error = isset($response->errors) ? true : false;
            if ($is_error) {
                return '';
            }

            // Get the text data from the tweet:
            if (isset($response[0]->text)) {
                $new_tweet = $response[0]->text;

                // Store the time of the successful request:
                // Add  + update the option (does nothing if the option already exists):
                add_option($this->var_tweet, $new_tweet, '', 'yes');
                update_option($this->var_tweet, $new_tweet);

                // Update the time of the last tweet stored:
                update_option($this->var_time, $curr_time);

                return $new_tweet;
            }

        }

        // If anything above goes wrong, just return the last tweet.
        return $last_tweet_data;
    }

}


