<?php
/**
 * Created by PhpStorm.
 * User: viktor
 * Date: 6/26/17
 * Time: 1:21 AM
 */

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