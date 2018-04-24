<?php

namespace App\Controller;

use App\Service\TwitterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class TwitterController extends AbstractController
{
    public function index(TwitterService $twitterService)
    {
        $domain_name = substr(strrchr($this->getUser()->getEmail(), "@"), 1);

        $twitterService->persistLastTweets();

        return new JsonResponse($twitterService->getStatusesMentionsTimeline(), 200, [], true);
    }
}