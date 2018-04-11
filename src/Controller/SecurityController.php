<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\Type\UserType;
use App\Service\GoogleService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * Handle Classic form and Google
     *
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        $user = new User;
        $form = $this->createForm(UserType::class, $user);
        return $this->render('security/login.html.twig', [
            'form' => $form->createView(),
            'last_email' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError(),
            'google_redirect_uri' => $this->get(GoogleService::class)->getRedirectUri(),
        ]);
    }

    /**
     * Handle Google Login check
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function loginCheck(Request $request)
    {
        if (null !== $request->get('error')){
            return $this->redirectToRoute('login');
        }

        $this->get(GoogleService::class)->authUser($request->get('code'));
        return $this->redirectToRoute('index');
    }
}
