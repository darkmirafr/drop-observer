<?php

namespace AppBundle\Service;

use Abraham\TwitterOAuth\TwitterOAuth;
use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class TwitterService
{
    /**
     * @var User $user
     */
    private $user;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->user = $tokenStorage->getToken()->getUser();
    }

    /**
     * @param string $query
     * @return array
     */
    public function searchTweets(string $query)
    {
        $connection = new TwitterOAuth($this->user->getTwitterPublicId(), $this->user->getTwitterSecretId());
        $statuses = $connection->get("search/tweets", ["q" => $query, "include_entities" => false]);
        return $statuses->statuses;
    }

}