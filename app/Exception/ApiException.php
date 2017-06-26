<?php

namespace TradoLogic\Exception;

class ApiException extends \Exception
{
    public function __construct($code, $message)
    {
        parent::__construct($message, $code);
    }
}