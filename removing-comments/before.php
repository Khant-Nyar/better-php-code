<?php

class TwitterClient
{

  // ...

    // get tweets since yesterday for handle
    public function recentTweets($handle)
    {
        // date for yesterday
        $date = date('Y-m-d', strtotime('yesterday'));

        // array of recent tweets to return
        $retval = [];

        // user_timeline endpoint gives move
        // control over response data
        $tweets = $this->client->get(
            'statuses/user_timeline',
            ['screen_name' => $handle, 'exclude_replies' => true, 'trim_user' => true]
        )

        // loop over tweets to filter yesterday
        // by comparing the date of tweet
        foreach ($tweets as $tweet) {
            if (date('Y-m-d', strtotime($tweet->created_at) >= $date)) {
                $retval[] = $tweet;
            }
        }

        // return recent tweets
        return $retval;
    }

    // ...
}
