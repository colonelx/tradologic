<?php

namespace TradoLogic\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class TokenMiddleware
{
    private $tokenManager;
    public function __construct($tokenManager)
    {
        $this->tokenManager = $tokenManager;
    }

    public function __invoke(Request $request, Response $response, callable $next)
    {
        $params = $request->getQueryParams();
        $token = (isset($params['token'])) ? $params['token'] : null;

        if (!empty($token) && $this->tokenManager->check($token)) {
            return $next($request, $response);
        }

        /** @noinspection PhpUndefinedMethodInspection */
        return $response->withRedirect('/info', 302);
    }
}