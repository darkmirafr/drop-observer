<?php
namespace App\Service;

use App\Manager\UserManager;
use Google_Service_Plus;
use Symfony\Component\HttpFoundation\RequestStack;

class GoogleService
{
    private $googleClient;
    private $userManager;

    public function __construct(\Google_Client $googleClient, RequestStack $request, UserManager $userManager)
    {
        $this->googleClient = $googleClient;
        $this->googleClient->setIncludeGrantedScopes(true);
        $this->googleClient->setRedirectUri('http://' . $request->getCurrentRequest()->server->get('HTTP_HOST') . '/login-check');
        $this->userManager = $userManager;
    }

    public function getRedirectUri(): string
    {
        return $this->googleClient->createAuthUrl(\Google_Service_Oauth2::USERINFO_EMAIL);
    }

    /**
     * WIP
     *
     * @param string $authCode
     * @return array
     */
    public function fetchUserByCode(string $authCode)
    {
        $this->googleClient->fetchAccessTokenWithAuthCode($authCode);
        $plus = new Google_Service_Plus($this->googleClient);
        $people = $plus->people->get('me');

        $email = $people->getEmails()[0]->getValue();
        $user = $this->userManager->getRepository()->findOneBy(['email' => $email]);

        return [
            'user' => $user,
            'email' => $people->getEmails()[0]->getValue(),
            'name' => $people->getDisplayName(),
            'google_id' => $people->getId(),
            'image_url' => $people->getImage()->getUrl(),
        ];
    }
}
