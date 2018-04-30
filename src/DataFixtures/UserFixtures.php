<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public const USER_REFERENCE = 'user';

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('test@test.com');
        $user->setTwitterConsumerKey('TwitterConsumerKey');
        $user->setTwitterConsumerSecret('TwitterConsumerSecret');
        $user->setTwitterAccessToken('TwitterAccessToken');
        $user->setTwitterAccessTokenSecret('TwitterAccessTokenSecret');

        $manager->persist($user);
        $manager->flush();

        $this->addReference(self::USER_REFERENCE, $user);
    }
}