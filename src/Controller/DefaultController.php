<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\Type\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{
    public function index()
    {
        return $this->render('default/index.html.twig');
    }

    public function login(Request $request, UserRepository $userRepository)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $userRepository->findOneBy(['email' => $form->getData()->getEmail()]);
            if (null === $user){
                $this->addFlash('warning', 'Wrong email or password, try again.');
                return $this->render('default/login.html.twig', [
                    'form' => $form->createView()
                ]);
            }
            $this->addFlash('success', 'Email found.');
        }

        return $this->render('default/login.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function admin()
    {
        return $this->render('default/admin.html.twig');
    }

}
