<?php

use App\Http;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Factory\AppFactory;

http_response_code(500);

require __DIR__ . '/../vendor/autoload.php';

$builder = new DI\ContainerBuilder();

$builder->addDefinitions([
    'config' => [
        'debug' => (bool)getenv('APP_DEBUG'),
    ],
    ResponseFactoryInterface::class => Di\get(Slim\Psr7\Factory\ResponseFactory::class),
]);

$container = $builder->build();

$app = AppFactory::createFromContainer($container);

$app->addErrorMiddleware($container->get('config')['debug'], true, true);

(require __DIR__ . '/../config/routes.php')($app);

$app->run();