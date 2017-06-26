<?php

namespace TradoLogic\Validation;


use TradoLogic\Model\Game;

interface GameValidatorInterface
{
    public function validate(Game $game);
}