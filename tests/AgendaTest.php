<?php

namespace OpenAgendaSdkTests;

use OpenAgendaSdk\OpenAgendaSdkException;
use PHPUnit\Framework\TestCase;

class AgendaTest extends TestCase
{
    private const ENDPOINT = 'agenda';

    /**
     * @throws OpenAgendaSdkException
     * @test
     */
    public function testGetAgendaShouldReturnJson()
    {
        $data = HelperTest::getOa(self::ENDPOINT, 'GET')->getAgenda(123456);
        $this->assertJson($data);
    }

    /**
     * @throws OpenAgendaSdkException
     * @test
     */
    public function testGetAgendaShouldHaveAnUid()
    {
        $data = HelperTest::getOa(self::ENDPOINT, 'GET')->getAgenda(123456);
        $agenda = json_decode($data);
        $this->assertNotNull($agenda->uid);
        $this->assertIsInt($agenda->uid);
    }
}
