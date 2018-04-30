<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class EventFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 3; $i++) {
            $event = new Event();
            $event->setName('Event_'.$i);
            $event->setCreateAt(new \DateTime());
            $event->setUser($this->getReference(UserFixtures::USER_REFERENCE));
            $manager->persist($event);
        }

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
