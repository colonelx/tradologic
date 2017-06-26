<?php

namespace TradoLogic\Model;

/**
 * @SWG\Definition(required={"id", "name"}, type="object", @SWG\Xml(name="Game"))
 */
class Game
{
    /**
     * @SWG\Property(format="int64")
     * @var int
     */
    public $id;

    /**
     * @SWG\Property
     * @var string
     */
    public $name;

    public function __construct($id = 0, $name = "")
    {
        $this->id = $id;
        $this->name = $name;
    }
}