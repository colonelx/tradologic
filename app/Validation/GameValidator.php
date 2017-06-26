<?php
/**
 * Created by PhpStorm.
 * User: viktor
 * Date: 6/27/17
 * Time: 1:25 AM
 */

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