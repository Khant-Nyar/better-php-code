<?php

class TwitterClient
{

    // ...

    public function tweetsSinceYesterday($handle)
    {
        // user_timeline endpoint offers more parameters to limit
        // size of the response which improves performance
        $tweets = $this->client->get(
            'statuses/user_timeline',
            ['screen_name' => $handle, 'exclude_replies' => true, 'trim_user' => true]
        )

        $yesterday = date('Y-m-d', strtotime('yesterday'));

        return $this->filterTweetsByDay($tweets, $yesterday);
    }

    // ...
}
