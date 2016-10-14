<?php

namespace Kayako\NetworkCalls;
use Kayako\Authorization\AuthorizationCredentials;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterApiCalls
{

    protected $SEARCH_API = "search/tweets";
    protected $connection;

    public function __construct()
    {
        $oauthCredentialObj = new AuthorizationCredentials();
        $this->connection = $oauthCredentialObj->getConnection();
    }
    public function executeSearchApi($param)
    {
        $response = $this->connection->get($this->SEARCH_API, ["q" => "#".$param["q"], "max_id" => $param["max_id"], "count" => "50"]);
        return $response;
    }

}