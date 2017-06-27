<?php

namespace TradoLogic\Controller;


use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends BaseController
{
    public function info(Request $request, Response $response)
    {
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write($this->container->get('swagger'));
    }
}