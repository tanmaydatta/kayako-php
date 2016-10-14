<?php
/**
 * Created by IntelliJ IDEA.
 * User: shivangi
 * Date: 10/14/16
 * Time: 6:14 PM
 */

namespace Kayako\Controllers;

use Kayako\NetworkCalls\TwitterApiCalls;

class TwitterApiController
{
    protected $apiCall;
    public function __construct()
    {
        $this->apiCall = new TwitterApiCalls();
    }
    
    public function fetchTweet($number_of_weeks)
    {
        try {
            $result = $this->apiCall->executeSearchApi($number_of_weeks);
        }
        catch (\Exception $e)
        {
            $result = "Error in fetching data";
        }
        return $result;
    }
}