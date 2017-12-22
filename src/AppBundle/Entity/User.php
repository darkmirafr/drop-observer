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
    private $email;

    /**
     * @var string
     *
     * @ORM\Column
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column
     */
    private $profilePicture;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true)
     */
    private $twitterPublicId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true)
     */
    private $twitterSecretId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true)
     */
    private $twitterScreenName;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getProfilePicture()
    {
        return $this->profilePicture;
    }

    /**
     * @param string $profilePicture
     * @return User
     */
    public function setProfilePicture(string $profilePicture)
    {
        $this->profilePicture = $profilePicture;
        return $this;
    }

    /**
     * @return string
     */
    public function getTwitterPublicId()
    {
        return $this->twitterPublicId;
    }

    /**
     * @param string $twitterPublicId
     * @return User
     */
    public function setTwitterPublicId(string $twitterPublicId)
    {
        $this->twitterPublicId = $twitterPublicId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTwitterSecretId()
    {
        return $this->twitterSecretId;
    }

    /**
     * @param string $twitterSecretId
     * @return User
     */
    public function setTwitterSecretId(string $twitterSecretId)
    {
        $this->twitterSecretId = $twitterSecretId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTwitterScreenName()
    {
        return $this->twitterScreenName;
    }

    /**
     * @param string $twitterScreenName
     * @return User
     */
    public function setTwitterScreenName(string $twitterScreenName)
    {
        $this->twitterScreenName = $twitterScreenName;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

}
