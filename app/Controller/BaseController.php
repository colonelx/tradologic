<?php

namespace TradoLogic\Controller;

use Interop\Container\ContainerInterface;
use QKidsDemo\Library\QelloApi;
use QKidsDemo\Model\Device;
use Slim\Http\Response;
use TradoLogic\Model\ApiResponse;

/**
 * Class BaseController
 * @package TradoLogic\Controller
 */
abstract class BaseController
{
    protected $container;

    /**
     * BaseController constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    protected function respond(ApiResponse $apiResponse, Response $response)
    {

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write(json_encode($apiResponse));
    }
}
