<?php

namespace App\Controller;

use App\Service\TwitterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends AbstractController
{
    public function index(TwitterService $twitterService)
    {
        $twitterService->persistLastTweets();
        return new JsonResponse($twitterService->getStatusesMentionsTimeline(), 200, [], true);
    }
}
