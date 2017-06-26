<?php
/**
 * Created by PhpStorm.
 * User: viktor
 * Date: 6/26/17
 * Time: 12:14 AM
 */

namespace TradoLogic\Library;

use TradoLogic\Model\Game;

/**
 * Class GamesManager
 * This class acts as a Repository for the Games data.
 * @package TradoLogic\Library
 */
class GamesManager
{
    private function games()
    {
        return [
            new Game(1, 'Game 1'),
            new Game(2, 'Game 2'),
            new Game(3, 'Game 3'),
            new Game(4, 'Game 4')
        ];
    }
    public function listAll()
    {
        return $this->games();
    }

    /**
     * Add a game
     *
     * @param Game $game
     * @return int
     */
    public function add(Game $game)
    {
        // Uncomment this to test
        // Just between you and me, this is stored!
        return true;
    }


    /**
     * Remove Game Obj from Database
     *
     * I choose to fetch a Game object, to preserve code readability,
     * but for optimisation purposes, this could be changed to accept ids
     * [Will save one SELECT query, if working with IDs]
     *
     * @param Game $game
     * @return bool
     */
    public function remove(Game $game)
    {
        // Just between you and me, this is deleted!
        return true;
    }

    public function getBy($field, $value)
    {
        foreach($this->games() as $game)
        {
            if($game->{$field} == $value)
                return $game;
        }

        return null;
    }

}