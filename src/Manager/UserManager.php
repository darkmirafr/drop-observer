<?php

namespace App\Manager;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserManager
{
    private $entityManager;
    private $encoder;
    private $userRepository;

    /**
     * UserManager constructor.
     */
    public function __construct(EntityManagerInterface $entityManager, UserPasswordEncoderInterface $encoder, UserRepository $userRepository)
    {
        $this->entityManager = $entityManager;
        $this->encoder = $encoder;
        $this->userRepository = $userRepository;
    }

    public function getRepository(): UserRepository
    {
        return $this->userRepository;
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
