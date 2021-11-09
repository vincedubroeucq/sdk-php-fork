<?php

namespace OpenAgendaSdkTests;

use OpenAgendaSdk\OpenAgendaSdkException;
use PHPUnit\Framework\TestCase;

class EventsTest extends TestCase
{
    private const ENDPOINT = 'events';

    /**
     * @throws OpenAgendaSdkException
     * @test
     */
    public function testGetEventsShouldReturnJson()
    {
        $data = HelperTest::getOa(self::ENDPOINT, 'GET')->getEvents(123456);
        $this->assertJson($data);
    }

    /**
     * @throws OpenAgendaSdkException
     * @test
     */
    public function testGetEventsShouldReturnAListOfEvents()
    {
        $data = HelperTest::getOa(self::ENDPOINT, 'GET')->getEvents(123456);
        $events = json_decode($data);
        $this->assertNotNull($events->events);
        $this->assertIsArray($events->events);
    }
}
