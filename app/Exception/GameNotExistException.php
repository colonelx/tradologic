<?php

namespace TradoLogic\Exception;


class GameNotExistException extends ApiException
{
    protected $code = 404;
    public function __construct($id)
    {
        parent::__construct($this->code, sprintf("Game with id '%d' does not exist", $id));
    }
}