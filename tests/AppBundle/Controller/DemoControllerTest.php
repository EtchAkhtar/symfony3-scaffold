<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Entity\Demo;

class DemoControllerTest extends WebTestCase
{
    public function testDemoIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/demo');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Table', $crawler->filter('#container')->text());
    }

    public function testDemoModalIsJSON()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/demo/modal');

		$this->assertTrue(
		    $client->getResponse()->headers->contains(
		        'Content-Type',
		        'application/json'
		    ),
		    'the "Content-Type" header is "application/json"' // optional message shown on failure
		);

    }

    public function testIncrementAge()
    {
		$demo = new Demo();
        $demo->setAge(36);

		$result = $demo->incrementAge();
		$this->assertEquals(37, $result);

		$result = $demo->getAge();
		$this->assertEquals(37, $result);
	}
}
