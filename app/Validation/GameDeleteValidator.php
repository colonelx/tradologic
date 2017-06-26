<?php

namespace TradoLogic\Validation;


use TradoLogic\Exception\GameNotExistException;
use TradoLogic\Model\Game;

class GameDeleteValidator extends GameValidator implements GameValidatorInterface
{
    public function validate(Game $game)
    {
        $this->checkRequiredFields($game);
        $this->checkExists($game);

        return true;
    }

    protected function checkRequiredFields($game)
    {
        if ($game->id === null)
            throw new ParameterRequiredApiException('id');

        return true;
    }

    protected function checkExists($game)
    {
        $existing = $this->gm->getBy('id', $game->id);
        if (!$existing) {
            throw new GameNotExistException($game->id);
        }
    }
}