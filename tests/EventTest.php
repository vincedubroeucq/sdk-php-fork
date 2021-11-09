<?php

namespace OpenAgendaSdkTests;

use OpenAgendaSdk\OpenAgendaSdkException;
use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{
    private const ENDPOINT = 'event';

    /**
     * @throws OpenAgendaSdkException
     * @test
     */
    public function testGetEventShouldReturnJson()
    {
        $data = HelperTest::getOa(self::ENDPOINT, 'GET')->getEvent(123456, 654321);
        $this->assertJson($data);
    }

    /**
     * @throws OpenAgendaSdkException
     * @test
     */
    public function testGetEventShouldReturnAnEvent()
    {
        $data = HelperTest::getOa(self::ENDPOINT, 'GET')->getEvent(123456, 654321);
        $event = json_decode($data);
        $this->assertIsBool($event->success);
        $this->assertEquals(TRUE, $event->success);
        $this->assertNotNull($event->event);
        $this->assertNotNull($event->event->uid);
    }
}
