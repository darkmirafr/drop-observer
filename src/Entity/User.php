<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(unique=true)
     */
    private $email;

    /**
     * @ORM\Column
     */
    private $username;

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getRoles(): array
    {
        return array('ROLE_USER');
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {
    }

    public function getPassword(): void
    {
    }
}
