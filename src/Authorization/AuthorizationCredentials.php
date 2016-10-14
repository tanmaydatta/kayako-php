<?php
/**
 * Created by IntelliJ IDEA.
 * User: shivangi
 * Date: 10/14/16
 * Time: 3:33 AM
 */
namespace Kayako\Authorization;

class AuthorizationCredentials
{
   protected $token;


    public function __construct()
    {
        $this->token['oauth_consumer_key'] = "EhWiZnsB70ajQH6lm0sMs3ShZ";
        $this->token['oauth_nonce'] = "9aa88d7abcdf2552eab49d468e97108f";
        $this->token['oauth_signature'] = "UqEwv%2FoaYlb508IOFvFqRKKFqV4%3D";
        $this->token['oauth_signature_method'] = "HMAC-SHA1";
        $this->token['oauth_timestamp'] = "1476452991";
        $this->token['oauth_token'] = "3138971928-uw6J2EY721heBIGVqXA2dZ4Y14FC9JLKWv5paw7";
        $this->token['oauth_version'] = "1.0";
    }

    public function getOauthToken()
    {   
        $authorisation=null;

        foreach ($this->token as $key=>$value)
        {
            $authorisation.=$key."=".$value.", ";
        }
        $authorisation = trim($authorisation,", ");
        
        $authorisation="Authorization: OAuth ".$authorisation;
        return $authorisation;
    }
}
