<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class GoogleService
{
    private $googleClient;
    private $session;

    public function __construct(\Google_Client $googleClient, SessionInterface $session)
    {
        $this->googleClient = $googleClient;
        $this->googleClient->setIncludeGrantedScopes(true);
        $this->googleClient->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/login-check');
        $this->googleClient->useApplicationDefaultCredentials();
        $this->session = $session;
    }

    public function getRedirectUri(): string
    {
        return $this->googleClient->createAuthUrl(\Google_Service_Oauth2::USERINFO_EMAIL);
    }

    public function authUser(string $authCode)
    {
        return $this->googleClient->fetchAccessTokenWithAuthCode($authCode);
    }
}
