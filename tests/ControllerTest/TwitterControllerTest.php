<?php

namespace App\ControllerTest;

use App\Entity\Tweet;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TwitterControllerTest extends WebTestCase
{
    public function testTweetIsInstantiable()
    {
        $tweet = new Tweet;
        $tweet->setUser('phpunitUser');
        $tweet->setTruncated(true);
        $tweet->setText('phpunitText');
        $tweet->setCreatedAt(new \DateTime);

        $this->assertInstanceOf(Tweet::class, $tweet);
    }
}
