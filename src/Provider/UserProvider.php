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
    public function loadUserByOAuthUserResponse(UserResponseInterface $r): UserInterface
    {
        $user = $this->userManager->getRepository()->findOneBy(['email' => $r->getEmail()]);
        if (null === $user){
            $user = new User;
            $user->setEmail($r->getEmail());
            $user->setUsername($r->getNickname());
            $this->userManager->save($user);
        }

        return $user;
    }
}