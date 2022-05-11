<?php

namespace App\Tests\Service\MovieDb;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\HttpClient\MockHttpClient;

class GetFilmByIdTest extends WebTestCase
{
    public function testSomething()
    {
        $client = static::createClient();

        $response = new MockResponse('GET', ['http_code' => 200]);
        $client->getContainer()->set(HttpClientInterface::class, new MockHttpClient($response));

        $client->request('GET', '/api');

        self::assertResponseIsSuccessful();
    }
}
