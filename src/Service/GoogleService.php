<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;

class GoogleService
{
    private $googleClient;

    public function __construct(\Google_Client $googleClient, RequestStack $request)
    {
        $this->googleClient = $googleClient;
        $this->googleClient->setIncludeGrantedScopes(true);
        $this->googleClient->setRedirectUri('http://' . $request->getCurrentRequest()->server->get('HTTP_HOST') . '/login-check');
        $this->googleClient->useApplicationDefaultCredentials();
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
