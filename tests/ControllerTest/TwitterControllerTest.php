<?php

namespace App\ControllerTest;

use App\Entity\Tweet;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TwitterControllerTest extends WebTestCase
{
    /** @var Client */
    private $client;

    public function setUp()
    {
        $this->client = self::createClient();
    }

    public function testTweetIsInstantiable()
    {
        $tweet = new Tweet;
        $tweet->setUser('phpunitUser');
        $tweet->setTruncated(true);
        $tweet->setText('phpunitText');
        $createdAt = new \DateTime;
        $tweet->setCreatedAt($createdAt);

        $this->assertInstanceOf(Tweet::class, $tweet);
        $this->assertSame('phpunitUser', $tweet->getUser());
        $this->assertSame(true, $tweet->isTruncated());
        $this->assertSame('phpunitText', $tweet->getText());
        $this->assertSame($createdAt, $tweet->getCreatedAt());
    }
}
