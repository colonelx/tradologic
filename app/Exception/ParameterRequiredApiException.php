<?php

namespace TradoLogic\Exception;


class ParameterRequiredApiException extends ApiException
{
    protected $code = 400;
    public function __construct($paramName)
    {
        parent::__construct($this->code, sprintf("Parameter '%s' is required!", $paramName));
    }
}