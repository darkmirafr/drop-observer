<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{
    public function index()
    {
        return $this->render('default/index.html.twig');
    }

    public function login(Request $request)
    {

        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('admin');
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
