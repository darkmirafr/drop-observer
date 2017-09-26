<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        $data = '';
        foreach(range(0,2000) as $n){
            $data .= round(pow((sqrt(5)+1)/2, $n) / sqrt(5)) . ' ';
        }

        return new JsonResponse(['data' => $data], Response::HTTP_I_AM_A_TEAPOT);
    }
}
