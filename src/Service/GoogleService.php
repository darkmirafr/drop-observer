<?php
namespace App\Service;

use App\Entity\User;
use App\Manager\UserManager;
use Google_Service_Plus;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class GoogleService
{
    private $googleClient;
    private $userManager;
    private $session;

    public function __construct(\Google_Client $googleClient, RequestStack $request, UserManager $userManager, SessionInterface $session)
    {
        $this->googleClient = $googleClient;
        $this->googleClient->setIncludeGrantedScopes(true);
        $this->googleClient->setRedirectUri('http://' . $request->getCurrentRequest()->server->get('HTTP_HOST') . '/login-check');
        $this->userManager = $userManager;
        $this->session = $session;
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

        if (null === $user){
            $user = new User;
            $user->setEmail($email);
            $user->setUsername($people->getDisplayName());
            $user->setGoogleId($people->getId());
            $this->userManager->save($user);
        }

        return [
            'user' => $user,
            'email' => $people->getEmails()[0]->getValue(),
            'name' => $people->getDisplayName(),
            'google_id' => $people->getId(),
            'image_url' => $people->getImage()->getUrl(),
        ];
    }
}
