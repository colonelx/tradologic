<?php

use Psr\Container\ContainerInterface;
use Slim\App;

$app_container = function (ContainerInterface $c) {
    $app = new App($c);
    // routes and middlewares here

    $app->get('/', function ($request, $response, $args) {
        return $response->withRedirect('/info/');
    });

    $app->get('/token[/]', TradoLogic\Controller\TokenController::class . ':get');
    $app->get('/info[/]', TradoLogic\Controller\HomeController::class . ':info');

    $app->group('/api', function() use ($app) {


        /** @noinspection PhpUndefinedVariableInspection */
        $app->get('/games[/]', TradoLogic\Controller\GameController::class . ':listAll')
            ->setName('list_games');

        /** @noinspection PhpUndefinedVariableInspection */
        $app->post('/game[/]', TradoLogic\Controller\GameController::class . ":add")
            ->setName('add_game');

        $app->delete('/game/{id}[/]', TradoLogic\Controller\GameController::class . ":remove")
            ->setName('remove_game');

    })->add(new TradoLogic\Middleware\TokenMiddleware($c->get('token_manager')));
    return $app;
};

return $app_container;
