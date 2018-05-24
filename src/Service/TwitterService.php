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
        return $this->serializer->serialize($this->tweetRepository->findBy([], null, 200), 'json');
    }

    public function persistLastTweets(): void
    {
        /** @var Tweet $lastTweet */
        $lastTweet = $this->tweetRepository->findOneBy([], ['createdAt' => 'DESC']);

        $tweetsParameters = [];
        if (null !== $lastTweet) {
            $tweetsParameters = ['since_id' => $lastTweet->getTweetId()];
        }

        $tweetsArray = $this->client->getClient()->get('statuses/mentions_timeline', $tweetsParameters);

        foreach ($tweetsArray as $tweetArray) {
            $tweet = new Tweet();
            $tweet->setTweetId($tweetArray->id_str);
            $tweet->setCreatedAt(new \DateTime($tweetArray->created_at));

            $team = null;
            foreach ([Tweet::TEAM_GREEN, Tweet::TEAM_GREEN] as $value){
                if (false !== strpos($tweetArray->text, $value)){
                    $team = $value;
                    break;
                }
            }
            $tweet->setTeam($team);

            $move = null;
            foreach ([Tweet::MOVE_LEFT, Tweet::MOVE_RIGHT, Tweet::MOVE_FORWARD, Tweet::MOVE_BACKWARD] as $value){
                if (false !== strpos($tweetArray->text, $value)){
                    $move = $value;
                    break;
                }
            }
            $tweet->setMove($move);

            $tweet->setText($tweetArray->text);
            $tweet->setUser($tweetArray->user->screen_name);

            $this->entityManager->persist($tweet);
        }
        $this->entityManager->flush();
    }
}
