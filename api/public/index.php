<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

http_response_code(500);

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$container = new Container();

$app = AppFactory::createFromContainer($container);

$app->addErrorMiddleware((bool)getenv('APP_DEBUG'), true, true);

$app->get('/',  \App\Http\Action\HomeAction::class);

$app->run();