<?php

namespace App\ControllerTest;

use App\Entity\Tweet;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityTest extends WebTestCase
{
    /** @var Client */
    private $client;

    public function setUp()
    {
        $this->client = self::createClient();
    }

    public function testLoginPageIsSuccessful()
    {
        $this->client->request('GET', '/login');

        $this->assertTrue($this->client->getResponse()->isRedirect('http://localhost/login/'));
    }

    public function testUserIsInstantiable()
    {
        $user = new User();
        $user->setUsername('phpunit-user');
        $user->setEmail('phpunit@test.me');
        $roles = ['ROLE_USER'];
        $user->setRoles($roles);
        $user->addRole('ROLE_USER_PHPUNIT');
        $user->setTwitterAccessToken('phpunitTwitterAccessToken');
        $user->setTwitterAccessTokenSecret('phpunitTwitterAccessTokenSecret');
        $user->setTwitterConsumerKey('phpunitTwitterConsumerKey');
        $user->setTwitterConsumerSecret('phpunitTwitterConsumerSecret');

        $this->assertInstanceOf(User::class, $user);
        $this->assertSame('phpunit-user', $user->getUsername());
        $this->assertSame('phpunit@test.me', $user->getEmail());
        $this->assertSame(['ROLE_USER', 'ROLE_USER_PHPUNIT'], $user->getRoles());
        $this->assertSame('phpunitTwitterAccessToken', $user->getTwitterAccessToken());
        $this->assertSame('phpunitTwitterAccessTokenSecret', $user->getTwitterAccessTokenSecret());
        $this->assertSame('phpunitTwitterConsumerKey', $user->getTwitterConsumerKey());
        $this->assertSame('phpunitTwitterConsumerSecret', $user->getTwitterConsumerSecret());
    }

    public function testTweetIsInstantiable()
    {
        $tweet = new Tweet();
        $tweet->setUser('phpunitUser');
        $tweet->setTruncated(true);
        $tweet->setText('phpunitText');
        $createdAt = new \DateTime();
        $tweet->setCreatedAt($createdAt);

        $this->assertInstanceOf(Tweet::class, $tweet);
        $this->assertSame('phpunitUser', $tweet->getUser());
        $this->assertSame(true, $tweet->isTruncated());
        $this->assertSame('phpunitText', $tweet->getText());
        $this->assertSame($createdAt, $tweet->getCreatedAt());
    }
}
