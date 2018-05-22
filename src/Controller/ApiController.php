<?php

namespace App\Controller;

use App\Service\TwitterService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Swagger\Annotations as SWG;
use App\Entity\Tweet;

class ApiController extends AbstractController
{
    /**
     * @SWG\Get(
     *     path="/api",
     *     summary="This is the Twitter call",
     *     description="This is the Twitter call, yes it is.",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="token",
     *         in="header",
     *         description="Your API token",
     *         type="string",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Success",
     *         @SWG\Schema(ref=@Model(type=Tweet::class)),
     *     )
     * )
     */
    public function index(Request $request, TwitterService $twitterService, ContainerInterface $container)
    {
        if ($container->getParameter('app_token') !== $request->headers->get('token')) {
            return new JsonResponse(null, Response::HTTP_FORBIDDEN);
        }

        $twitterService->persistLastTweets();
        $data = $twitterService->getStatusesMentionsTimeline();

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }
}
