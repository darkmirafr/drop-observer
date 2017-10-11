<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column
     */
    private $password;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $username
     *
     * @return $this
     */
    public function setUsername($username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */
    public function getSalt(): void
    {
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials(): void
    {
    }

}

