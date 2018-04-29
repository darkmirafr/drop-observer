<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
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
     * @ORM\Column(nullable=true)
     */
    private $username;

    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    private $roles;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true)
     */
    private $twitterConsumerKey;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true)
     */
    private $twitterConsumerSecret;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true)
     */
    private $twitterAccessToken;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true)
     */
    private $twitterAccessTokenSecret;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Event", mappedBy="user", orphanRemoval=true)
     */
    private $events;

    public function __construct()
    {
        $this->roles = ['ROLE_USER'];
        $this->events = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return User
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return User
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     *
     * @return User
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @param string $role
     * @return User
     */
    public function addRole(string $role): User
    {
        $this->roles[] = $role;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTwitterConsumerKey(): ?string
    {
        return $this->twitterConsumerKey;
    }

    /**
     * @param string $twitterConsumerKey
     *
     * @return User
     */
    public function setTwitterConsumerKey(string $twitterConsumerKey): self
    {
        $this->twitterConsumerKey = $twitterConsumerKey;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTwitterConsumerSecret(): ?string
    {
        return $this->twitterConsumerSecret;
    }

    /**
     * @param string $twitterConsumerSecret
     *
     * @return User
     */
    public function setTwitterConsumerSecret(string $twitterConsumerSecret): self
    {
        $this->twitterConsumerSecret = $twitterConsumerSecret;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTwitterAccessToken(): ?string
    {
        return $this->twitterAccessToken;
    }

    /**
     * @param string $twitterAccessToken
     *
     * @return User
     */
    public function setTwitterAccessToken(string $twitterAccessToken): self
    {
        $this->twitterAccessToken = $twitterAccessToken;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTwitterAccessTokenSecret(): ?string
    {
        return $this->twitterAccessTokenSecret;
    }

    /**
     * @param string $twitterAccessTokenSecret
     *
     * @return User
     */
    public function setTwitterAccessTokenSecret(string $twitterAccessTokenSecret): self
    {
        $this->twitterAccessTokenSecret = $twitterAccessTokenSecret;

        return $this;
    }

    public function getSalt(): void
    {
    }

    public function eraseCredentials(): void
    {
    }

    public function getPassword(): void
    {
    }

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->setUser($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
            // set the owning side to null (unless already changed)
            if ($event->getUser() === $this) {
                $event->setUser(null);
            }
        }

        return $this;
    }
}
