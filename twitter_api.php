<?php
/**
 * User: ronald
 * Date: 1/1/14
 * Time: 3:51 PM
 */

require('twitteroauth/twitteroauth.php');


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
//    private $oauth_endpoint = 'https://api.twitter.com/oauth2/token';
    private $user_timeline = 'https://api.twitter.com/1.1/statuses/user_timeline.json';


    public function __construct ($config) {

        // Set the configurable consumer key and consumer secret:
        if (!isset($config['key']) || !isset($config['secret'])) {
            throw new ErrorException('You must have a valid configuration to use the twitter api class.');
        }
        $this->consumer_key = $config->key;
        $this->consumer_secret = $config->secret;
    }


    /**
     * Uses 3rd party library to get authorization token from twitter:
     * This function is now deemed useless.
     * @deprecated
     */
    private function _get_auth_token () {
//        if (!isset($this->connection)) {
//            $this->connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret);
//        }
//
//        $response = $this->connection->getRequestToken('');
//
//        if (!isset($response['oauth_token']) || !isset($response['oauth_token_secret'])) {
//            return;
//        }
//
//        $this->oauth_token_secret = $response['oauth_token'];
//        $this->oauth_token = $response['oauth_token_secret'];
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

        $curr_time = time();
        // Get the time of the last successful request. If it was over 15 minutes ago, then retrieve the tweets.
        // Add the time option (does nothing if the option already exists):
        $added = add_option($this->var_time, $curr_time, '', 'yes');
        $tweet_time = get_option($this->var_time);

        // TODO : convert milliseconds to 15 minutes to get correct cacheing time.
        if (($curr_time - $tweet_time) > 15) {
            // GET THE LAST TWEET DATA:
            $last_tweet_data = get_option($this->var_tweet);
            if (!is_null($last_tweet_data)) {
//                die(var_dump($tweet_time, $curr_time));

                return $last_tweet_data;
            }
        }

        $params = array(
            'screen_name'=>$this->screen_name,
            'count'=>2
        );

        $response = $this->connection->get($this->user_timeline, $params);

        echo 'nerp<br>';
        die(json_encode($response));

        if ($response) {

            // If the response was an error, do nothing:
            $is_error = $response['error'] ? true : false;
            if ($is_error) {
                return;
            }
            // Store the time of the successful request:
            // Add the option (does nothing if the option already exists):
            $added = add_option($this->var_tweet, $response, '', 'yes');
            // Update the option:
            $updated = update_option($this->var_tweet, $response);

            return $response;

        } else {
            // Gracefully degrade by returning an empty string.
            return '';
        }

    }

}


