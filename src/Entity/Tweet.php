<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TweetRepository")
 */
class Tweet
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
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column
     */
    private $text;

    /**
     * @var bool
     *
     * @ORM\Column("boolean")
     */
    private $truncated;

    /**
     * @var string
     *
     * @ORM\Column
     */
    private $user;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Tweet
     */
    public function setCreatedAt(\DateTime $createdAt): Tweet
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Tweet
     */
    public function setText(string $text): Tweet
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTruncated(): bool
    {
        return $this->truncated;
    }

    /**
     * @param bool $truncated
     * @return Tweet
     */
    public function setTruncated(bool $truncated): Tweet
    {
        $this->truncated = $truncated;
        return $this;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return Tweet
     */
    public function setUser(string $user): Tweet
    {
        $this->user = $user;
        return $this;
    }
}
