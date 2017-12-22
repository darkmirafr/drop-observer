<?php

namespace AppBundle\Controller;

use AppBundle\Service\TwitterService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction(TwitterService $twitterService)
    {
        $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'))->value->joke;
        $tweets = $twitterService->searchTweets('bitcoin');

        if (null === $tweets){
            $this->addFlash('error', 'Twitter configuration is not correct');
            return $this->redirectToRoute('profile');
        }

        return $this->render('admin/index.html.twig', [
            'joke' => $joke,
            'tweets' => $tweets,
        ]);
    }
}
