<?php

namespace TradoLogic\Model;

/**
 * @SWG\Definition(type="object")
 */
class ApiResponse
{
    /**
     * @SWG\Property(format="int32")
     * @var int
     */
    public $code;

    /**
     * @SWG\Property
     * @var object
     */
    public $data;

    const CODE_SUCCESS = 200;
    const CODE_CREATED = 201;

    public function __construct($code, $data = null)
    {
        $this->code = $code;
        $this->data = $data;
    }


}