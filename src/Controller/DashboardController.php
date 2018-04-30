<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends AbstractController
{
    public function index(Request $request, EntityManagerInterface $entityManager, EventRepository $eventRepository)
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->denyAccessUnlessGranted('ROLE_USER_DARKMIRA');
            $event->setCreateAt(new \DateTime());
            $event->setUser($this->getUser());
            $entityManager->persist($event);
            $entityManager->flush();
            $this->addFlash('success', 'Your Event is created!');
        }

        $events = $eventRepository->findBy(['user' => $this->getUser()]);

        return $this->render('dashboard/index.html.twig', [
            'form' => $form->createView(),
            'events' => $events,
        ]);
    }
}
