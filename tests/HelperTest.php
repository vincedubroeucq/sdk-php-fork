<?php

namespace OpenAgendaSdkTests;

use OpenAgendaSdk\OpenAgendaSdk;
use OpenAgendaSdk\OpenAgendaSdkException;

class HelperTest
{

    private const TEST_PUBLIC_KEY = 'mypublickey';

    /**
     * @param $endpoint
     * @param $method
     * @return mixed
     */
    private static function getMockConfig($endpoint, $method)
    {
        $endpoints = json_decode(file_get_contents(__DIR__ . '/endpoints.json'));

        return $endpoints->{$endpoint}->{$method};
    }

    /**
     * @param $endpoint
     * @param $method
     * @return OpenAgendaSdk
     * @throws \Exception
     */
    public static function getOa($endpoint, $method)
    {
        $mockConfig = self::getMockConfig($endpoint, $method);
        $oa = new OpenAgendaSdk(self::TEST_PUBLIC_KEY);
        $body = file_get_contents(__DIR__ . '/' . $mockConfig->body);

        // Mock client response.
        $oa->getClient()->setMock(200, $body);

        return $oa;
    }
}
