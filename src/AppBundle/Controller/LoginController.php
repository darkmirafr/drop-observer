<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    public function indexAction(Request $request)
    {
        $form = $this->createForm(LoginType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $form->getData();
            // TODO
        }

        return $this->render('login/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
