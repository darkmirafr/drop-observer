<?php

namespace App\Controller;

use App\Service\TwitterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends AbstractController
{
    public function index(Request $request, TwitterService $twitterService, ContainerInterface $container)
    {
        if ($container->getParameter('app_token') !== $request->headers->get('token')) {
            return new JsonResponse(null, Response::HTTP_FORBIDDEN);
        }

        // Placeholder
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = ['pseudo' => 'user'.random_int(0, 1000)];
        }

//        $twitterService->persistLastTweets();
//        $data = $twitterService->getStatusesMentionsTimeline();

        return new JsonResponse($data, Response::HTTP_OK, [], false);
    }
}
