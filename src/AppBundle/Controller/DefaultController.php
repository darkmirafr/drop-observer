<?php

namespace AppBundle\Controller;

use Abraham\TwitterOAuth\TwitterOAuth;
use FOS\RestBundle\Controller\FOSRestController;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends FOSRestController
{
    public function getTweetsAction(Request $request)
    {
        $log = new Logger('twitter');
        $log->pushHandler(new StreamHandler('php://stderr', Logger::DEBUG));
        $consumerKey = getenv('TWITTER_CONSUMER_KEY');
        $consumerSecret = getenv('TWITTER_CONSUMER_SECRET');
        $accessToken = getenv('TWITTER_ACCESS_TOKEN');
        $accessTokenSecret = getenv('TWITTER_ACCESS_TOKEN_SECRET');

        if (true === $this->get('kernel')->isDebug()){
            $consumerKey = $this->getParameter('twitter_consumer_key');
            $consumerSecret = $this->getParameter('twitter_consumer_secret');
            $accessToken = $this->getParameter('twitter_access_token');
            $accessTokenSecret = $this->getParameter('twitter_access_token_secret');
        }

        $connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

        $mentionsTimeline = $connection->get('statuses/mentions_timeline', ['count' => 200]);
        $data = [];
        foreach ($mentionsTimeline as $mentionTimeline){
            $data[] = [
                'id' => $mentionTimeline->id,
                'created_at' => $mentionTimeline->created_at,
                'text' => $mentionTimeline->text,
                'user_id' => $mentionTimeline->user->id,
                'user_name' => $mentionTimeline->user->name,
                'user_screen_name' => $mentionTimeline->user->screen_name,
            ];
            $log->addDebug('event', $data);
        }

        return new JsonResponse($data);
    }
}
