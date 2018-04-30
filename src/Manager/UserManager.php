<?php

namespace App\Manager;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class UserManager
{
    private $entityManager;
    private $repository;

    /**
     * UserManager constructor.
     */
    public function __construct(EntityManagerInterface $entityManager, UserRepository $repository)
    {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    /**
     * @param User $user
     */
    public function save(User $user, $flush = false)
    {
        $this->entityManager->persist($user);
        if ($flush) {
            $this->flush();
        }
    }

    public function flush()
    {
        $this->entityManager->flush();
    }

    /**
     * @return UserRepository
     */
    public function getRepository(): UserRepository
    {
        return $this->repository;
    }
}
