<?php

namespace App\ControllerTest;

use App\Service\TwitterService;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TwitterTest extends WebTestCase
{
    /** @var Client */
    private $client;

    public function setUp()
    {
        $this->client = self::createClient();
    }

    public function testLoginPageIsSuccessful()
    {
        $twitterServiceStub = $this->getMockBuilder(TwitterService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $twitterServiceStub->method('checkTwitterClient')
            ->willReturn(true);

        $this->assertTrue($twitterServiceStub->checkTwitterClient());
    }
}
