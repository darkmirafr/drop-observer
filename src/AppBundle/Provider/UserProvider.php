<?php
namespace AppBundle\Provider;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthAwareUserProviderInterface;

class UserProvider implements OAuthAwareUserProviderInterface
{
    /** @var EntityManagerInterface $em */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $email = $response->getEmail();
        $username = $response->getNickname();

        $userRepository = $this->em->getRepository(User::class);

        $user = $userRepository->findByEmail($email);

        if (empty($user)){
            $user = new User();
            $user->setEmail($email);
            $user->setUsername($username);
            $this->em->persist($user);
            $this->em->flush();
            return $user;
        }

        return $user;

    }


}