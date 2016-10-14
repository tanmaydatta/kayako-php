<?php
/**
 * Created by IntelliJ IDEA.
 * User: shivangi
 * Date: 10/14/16
 * Time: 4:05 AM
 */

namespace Kayako\NetworkCalls;
use Kayako\Authorization\AuthorizationCredentials;

class TwitterApiCalls
{

    protected $SEARCH_API = "https://api.twitter.com/1.1/search/tweets.json?q=%23";
    protected $curl;
    protected $authorizationCredentials;
    protected $hashTag;

    public function __construct()
    {
        $this->curl = curl_init();
        $oauthCredentialObj = new AuthorizationCredentials();
        $this->authorizationCredentials = $oauthCredentialObj->getOauthToken();
    }
    public function executeSearchApi($numberOfWeeks)
    {
        $this->hashTag = 'custserv';

        $dateParam = $this->calculateDate($numberOfWeeks);
        $newUrl=$this->SEARCH_API.$this->hashTag;
        // $newUrl=$this->SEARCH_API.$this->hashTag."&until=".$dateParam;


        //echo $newUrl;
        curl_setopt_array($this->curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $newUrl,
            CURLOPT_HTTPHEADER => array($this->authorizationCredentials, "Content-Type: application/x-www-form-urlencoded"),
            CURLOPT_VERBOSE => 1,
        ));
        $response = curl_exec($this->curl);
       
        return $response;
    }

    public function calculateDate($numberOfWeeks)
    {
        $currentTime = time();
        $secondInAweek = 604800;
        $xWeeks = $secondInAweek * $numberOfWeeks;

        $requiredTimeStamp = $currentTime - $xWeeks;
        date_default_timezone_set('UTC');
        $date = date('Y-m-d', $requiredTimeStamp);

        return $date;
    }

}