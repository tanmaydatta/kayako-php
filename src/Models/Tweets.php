<?php

namespace Kayako\Model;

class Tweets
{
    public function extractRetweetedTweets($result)
    {   
        $response = [];
        $response["tweets"] = null;
        $response["status"] = "success";
        $response["next_url"] = $result->search_metadata->next_results;
        $tweetList = $result->statuses;
        foreach ($tweetList as $tweet)
        {
            $retweet_count = $tweet->retweet_count;
            if($retweet_count>=1)
            {
                $response["tweets"][]=$tweet;
            }
        }
        
        return json_encode($response);
    }

}