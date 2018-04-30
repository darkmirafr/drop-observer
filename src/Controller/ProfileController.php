<?php

namespace App\Controller;

use App\Form\ProfileType;
use App\Manager\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends AbstractController
{
    public function index(Request $request, UserManager $userManager)
    {
        $user = $this->getUser();
        $form = $this->createForm(ProfileType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userManager->save($user, true);
            $this->addFlash('success', 'Your changes were saved!');
        }

        return $this->render('profile/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
