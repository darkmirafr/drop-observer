<?php

namespace App\Manager;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserManager
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * UserManager constructor.
     */
    public function __construct(EntityManagerInterface $entityManager, UserPasswordEncoderInterface $encoder)
    {
        $this->entityManager = $entityManager;
        $this->encoder = $encoder;
    }

    /**
     * @param string $email
     * @param string $plainPassword
     */
    public function saveUserFromEmailAndPlainPassword(string $email, string $plainPassword)
    {
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($this->encoder->encodePassword($user, $plainPassword));
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
