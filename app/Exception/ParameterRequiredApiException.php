<?php
/**
 * Created by PhpStorm.
 * User: viktor
 * Date: 6/26/17
 * Time: 2:09 AM
 */

namespace TradoLogic\Exception;


class ParameterRequiredApiException extends ApiException
{
    protected $code = 400;
    public function __construct($paramName)
    {
        parent::__construct($this->code, sprintf("Parameter '%s' is required!", $paramName));
    }
}