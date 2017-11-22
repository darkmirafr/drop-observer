<?php
namespace AppBundle\Provider;

use AppBundle\Entity\User;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthAwareUserProviderInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class UserProvider implements OAuthAwareUserProviderInterface
{
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $accessToken = $response->getAccessToken();
        $email = $response->getEmail();
        $username = $response->getNickname();
        $tokenSecret = $response->getTokenSecret();

        $user = new User();
        return $user;
//        $user->setEmail($email);
//        $user->setUsername($username);
//        dump(42);
//        return $user;
    }


}