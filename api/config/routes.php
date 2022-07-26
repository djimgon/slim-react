<?php

declare(strict_types=1);

use App\Http\Action;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return static function (App $app): void {
    $app->get('/', Action\HomeAction::class);

//    $app->post('/v1/auth/join/', Action\V1\Auth\Join\RequestAction::class);
//    $app->post('/v1/auth/join/confirm/', Action\V1\Auth\Join\ConfirmAction::class);

    $app->group('/v1', function (RouteCollectorProxy $group): void {
        $group->group('/auth', function (RouteCollectorProxy $group): void {
            $group->post('/join/confirm', Action\V1\Auth\Join\ConfirmAction::class);
            $group->post('/join', Action\V1\Auth\Join\RequestAction::class);
        });
    });
};