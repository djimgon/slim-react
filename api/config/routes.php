<?php

use App\Http;
use Slim\App;

return static function (App $app): void {
    $app->get('/', Http\Action\HomeAction::class);
};