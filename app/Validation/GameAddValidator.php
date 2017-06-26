<?php

namespace TradoLogic\Validation;

use TradoLogic\Exception\DuplicateGameIdApiException;
use TradoLogic\Model\Game;

class GameAddValidator extends GameValidator implements GameValidatorInterface
{
    public function validate(Game $game)
    {
        $this->checkRequiredFields($game);
        $this->checkDuplicateId($game);

        return true;
    }

    protected function checkRequiredFields($game)
    {
        if ($game->id === null)
            throw new ParameterRequiredApiException('id');

        if ($game->name === null)
            throw new ParameterRequiredApiException('name');

        return true;
    }

    protected function checkDuplicateId($game)
    {
        $existing = $this->gm->getBy('id',$game->id);
        if ($existing) {
            throw new DuplicateGameIdApiException($existing->id, $existing->name);
        }
    }
}