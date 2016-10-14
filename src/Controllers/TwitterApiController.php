<?php

namespace Kayako\Controllers;

use Kayako\NetworkCalls\TwitterApiCalls;
use Kayako\Model\Tweets;

class TwitterApiController
{
    protected $apiCall;
    protected $tweet;
    public function __construct()
    {
        $this->apiCall = new TwitterApiCalls();
        $this->tweet = new Tweets();
    }
    
    public function fetchTweet($param)
    {
        try {
            $result = $this->apiCall->executeSearchApi($param);
            $final = $this->tweet->extractRetweetedTweets($result);
        }
        catch (\Exception $e)
        {
            $final = [];
            $final["status"] = "failed";
        }
        return $final;
    }
}