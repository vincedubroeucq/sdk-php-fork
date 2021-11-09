<?php

namespace OpenAgendaSdk;

/**
 * Class OpenAgendaSdkException
 * @package OpenAgendaSdk
 */
class OpenAgendaSdkException extends \Exception
{
    /**
     * OpenAgendaSdkException constructor.
     * @param $message
     *  The exception message.
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }

}
