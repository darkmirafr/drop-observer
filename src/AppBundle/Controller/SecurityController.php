<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{

    public function profileAction(Request $request, EntityManagerInterface $entityManager)
    {
        $user = $this->getUser();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('notice', 'Your changes were saved!');
            return $this->redirectToRoute('home');
        }

        return $this->render('security/profile.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
