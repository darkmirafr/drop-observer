<?php

namespace App\Controller;

use App\Service\TwitterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends AbstractController
{
    public function index(TwitterService $twitterService)
    {
        $tweets = $twitterService->getStatusesMentionsTimeline();
        return $this->render('dashboard/index.html.twig', [
            'tweets' => json_decode($tweets)
        ]);
    }
}
