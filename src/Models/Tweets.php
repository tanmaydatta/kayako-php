<?php
/**
 * Created by IntelliJ IDEA.
 * User: shivangi
 * Date: 10/14/16
 * Time: 3:32 AM
 */

class Tweets
{
    public function convertResultToJson($result)
    {
        $jsonData = json_decode($result);
        $data = $jsonData->{'statuses'};
        return $data;
    }

    public function extractRetweetedTweets($result)
    {   $retweetedList=null;

        $tweetList = $this->convertResultToJson($result);
        foreach ($tweetList as $tweet)
        {
            $retweet_count = $tweet->{'retweet_count'};
            if(json_encode($retweet_count)>=1)
            {
                $retweetedList[]=$tweet;
            }
        }

        return $retweetedList;
    }

}