<?php

use Psr\Container\ContainerInterface;
use Slim\App;

return static function (App $app, ContainerInterface $container): void {
    $app->addErrorMiddleware($container->get('config')['debug'], true, true);
};
