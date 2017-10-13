<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    public function indexAction(Request $request)
    {
        $form = $this->createForm(RegisterType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $form->getData();
            // TODO
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
