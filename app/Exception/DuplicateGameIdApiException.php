<?php

namespace TradoLogic\Exception;


class DuplicateGameIdApiException extends ApiException
{
    protected $code = 409;
    public function __construct($id, $name)
    {
        parent::__construct($this->code, sprintf("Duplicate id: %d, with name: %s", $id, $name));
    }
}