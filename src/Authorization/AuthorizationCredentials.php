<?php

namespace Kayako\Authorization;
use Abraham\TwitterOAuth\TwitterOAuth;

class AuthorizationCredentials
{
    protected $token;


    public function __construct()
    {
        $this->token['consumer_key'] = "fyi65m30QRabcDv3fJXHGcIdk";
        $this->token['consumer_key_secret'] = "8eJ09L2p8oEfnUW9gpFkK0z6b1PaIDfoLmhZJCR5OV06kfsvKl";
        $this->token['access_token'] = "82867644-GqPOJynbyfgc451HjNwn5QWvV6KsU5tCvbxvuqwaM";
        $this->token['access_token_secret'] = "oalNtrqjgbowcwohhSpCc59WK2EmAEgMEmvAvU4Krg0g7";
    }

    public function getConnection()
    {   
        $connection = new TwitterOAuth($this->token['consumer_key'], $this->token['consumer_key_secret'], $this->token['access_token'], $this->token['access_token_secret']);
        return $connection;
    }
}
