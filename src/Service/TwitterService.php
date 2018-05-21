<?php

namespace App\Service;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Entity\Tweet;
use App\Repository\TweetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Endroid\Twitter\Client;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class TwitterService
{
    private $client;
    private $entityManager;
    private $tweetRepository;
    private $serializer;

    public function __construct(TwitterOAuth $twitterOAuth, EntityManagerInterface $entityManager, TweetRepository $tweetRepository)
    {
        $this->client = new Client($twitterOAuth);
        $this->entityManager = $entityManager;
        $this->tweetRepository = $tweetRepository;

        $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
        $this->serializer = $serializer;
    }

    public function getStatusesMentionsTimeline()
    {
        return $this->serializer->serialize($this->tweetRepository->findBy([], null, 50), 'json');
    }

    public function persistLastTweets(): void
    {
        /** @var Tweet $lastTweet */
        $lastTweet = $this->tweetRepository->findOneBy([], ['createdAt' => 'DESC']);

        $lastTweetCreatedAt = null;
        if (null !== $lastTweet) {
            $lastTweetCreatedAt = $lastTweet->getCreatedAt();
        }

        $tweetsArray = $this->client->getClient()->get('statuses/mentions_timeline');
        foreach ($tweetsArray as $tweetArray) {
            $createdAt = new \DateTime($tweetArray->created_at);
            if ($lastTweetCreatedAt < $createdAt || null === $lastTweetCreatedAt) {
                $tweet = new Tweet();
                $tweet->setCreatedAt($createdAt);
                $tweet->setText($tweetArray->text);
                $tweet->setTruncated($tweetArray->truncated);
                $tweet->setUser($tweetArray->user->screen_name);
                $this->entityManager->persist($tweet);
            }
        }
        $this->entityManager->flush();
    }
}
