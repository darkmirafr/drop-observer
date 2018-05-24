<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TweetRepository")
 */
class Tweet
{
    const TEAM_GREEN = 'green';
    const TEAM_BLACK = 'black';
    const MOVE_LEFT = 'left';
    const MOVE_RIGHT = 'right';
    const MOVE_FORWARD = 'forward';
    const MOVE_BACKWARD = 'backward';

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
     * @ORM\Column
     */
    private $tweetId;

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
     * @var string
     *
     * @ORM\Column
     */
    private $user;

    /**
     * @var string
     *
     * columnDefinition="ENUM('left', 'right', 'forward', 'backward')
     * @ORM\Column(nullable=true)
     */
    private $move;

    /**
     * columnDefinition="ENUM('green', 'black')
     * @ORM\Column(nullable=true)
     */
    private $team;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTweetId(): string
    {
        return $this->tweetId;
    }

    /**
     * @param string $tweetId
     * @return Tweet
     */
    public function setTweetId(string $tweetId): Tweet
    {
        $this->tweetId = $tweetId;
        return $this;
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
     *
     * @return Tweet
     */
    public function setCreatedAt(\DateTime $createdAt): self
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
     *
     * @return Tweet
     */
    public function setText(string $text): self
    {
        $this->text = $text;

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
     *
     * @return Tweet
     */
    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMove()
    {
        return $this->move;
    }

    /**
     * @param mixed $move
     * @return Tweet
     */
    public function setMove($move)
    {
        $this->move = $move;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param mixed $team
     * @return Tweet
     */
    public function setTeam($team)
    {
        $this->team = $team;
        return $this;
    }
}
