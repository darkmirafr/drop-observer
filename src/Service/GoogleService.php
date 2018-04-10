<?php
namespace App\Service;

class GoogleService
{
    public function getRedirectUri(): string
    {
        $client = new \Google_Client();
        $client->setIncludeGrantedScopes(true);
        $client->addScope(\Google_Service_Logging::LOGGING_READ);
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/check-login');

        return $client->createAuthUrl();
    }
}
