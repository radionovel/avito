<?php
declare(strict_types=1);


namespace App\Advertising\Providers;

use Illuminate\Support\ServiceProvider;

class AdvertisingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $router = $this->app->make('router');
        $router->group([
            'namespace' => 'App\Advertising\Controllers',
        ], function ($router) {
            require __DIR__ . '/../routes.php';
        });
    }

    public function register()
    {
    }
}
