<?php


require_once __DIR__ . '/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->configure('app');
$app->register(App\Advertising\Providers\AdvertisingServiceProvider::class);
$app->register(App\Advertising\Providers\AppServiceProvider::class);
$app->register(App\Advertising\Providers\QueryFilterServiceProvider::class);

$app->withFacades();
$app->withEloquent();

$app->routeMiddleware([
    'pagination' => App\Advertising\Middleware\Pagination::class,
]);

return $app;
