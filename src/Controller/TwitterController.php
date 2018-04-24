<?php

namespace App\Controller;

use App\Service\TwitterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class TwitterController extends AbstractController
{
    public function index(TwitterService $twitterService)
    {
        $twitterService->persistLastTweets();
        $json = $twitterService->getStatusesMentionsTimeline();

        return new JsonResponse($json, 200, [], true);
    }
}
