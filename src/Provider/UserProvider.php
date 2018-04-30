<?php

namespace App\Provider;

use App\Entity\User;
use App\Manager\UserManager;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthAwareUserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserProvider implements OAuthAwareUserProviderInterface
{
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * Loads the user by a given UserResponseInterface object.
     *
     * @param UserResponseInterface $response
     *
     * @return UserInterface
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response): UserInterface
    {
        $user = $this->userManager->getRepository()->findOneBy(['email' => $response->getEmail()]);
        if (null === $user) {
            $user = new User();
            $email = $response->getEmail();
            $user->setEmail($email);
            $username = $response->getNickname();
            $user->setUsername($username);
            if (null === $username) {
                $user->setUsername($response->getNickname());
            }
            if ('darkmira.com' === substr(strrchr($email, '@'), 1)) {
                $user->addRole('ROLE_USER_DARKMIRA');
            }
            $this->userManager->save($user, true);
        }

        return $user;
    }
}
