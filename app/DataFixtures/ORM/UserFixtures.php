<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->setUsername('user' . $i);
            $user->setEmail('user' . $i . '@email.com');

            $encoder = $this->container->get('security.password_encoder');
            $password = $encoder->encodePassword($user, 'password' . $i);
            $user->setPassword($password);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
