<?php

namespace TradoLogic\Validation;


use TradoLogic\Library\GamesManager;

class GameValidator
{
    protected $gm;
    public function __construct(GamesManager $gm)
    {
        $this->gm = $gm;
    }

}