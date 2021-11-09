<?php

namespace OpenAgendaSdk;

/**
 * Class RequestOptions
 *
 * This class contains a list of built-in OpenAgendaSdk request options.
 * @package OpenAgendaSdk
 */
final class RequestOptions
{
    /**
     * base_uri: (string) Request base uri.
     */
    public const BASE_URI = 'base_uri';

    /**
     * proxy: (string|array) Pass a string to specify an HTTP proxy, or an
     * array to specify different proxies for different protocols (where the
     * key is the protocol and the value is a proxy string).
     */
    public const PROXY = 'proxy';

}
