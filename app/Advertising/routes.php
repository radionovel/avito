<?php
declare(strict_types=1);

/** @var Router $router */

use Laravel\Lumen\Routing\Router;


$router->group(['prefix' => '/api/v1/advertising'], function (Router $router) {
    $router->get('/{id}', 'AdvertisingController@detail');
    $router->get('/', [
        'middleware' => 'pagination',
        'uses' => 'AdvertisingController@list'
    ]);
    $router->post('/', 'AdvertisingController@store');
});
