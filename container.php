<?php

require 'vendor/autoload.php';
use \Slim\Container;

$dotEnv = new \Dotenv\Dotenv(realpath(__DIR__));
$dotEnv->load();
$config = require 'app/config/config.php';
$app = require 'app/config/router.php';
$swagger = \Swagger\scan(__DIR__ . '/app');

$container = new Container(array_merge(
    ['config' => $config],
    ['app' => $app],
    ['token_manager' => new \TradoLogic\Library\TokenManager()],
    ['games_manager' => new \TradoLogic\Library\GamesManager()],
    ['swagger' => $swagger]
));

return $container;