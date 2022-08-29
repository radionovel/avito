<?php
declare(strict_types=1);


namespace App\Advertising\Providers;

use App\Advertising\Repositories\AdvertisingMysqlRepository;
use App\Advertising\Repositories\AdvertisingRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(AdvertisingRepositoryInterface::class, AdvertisingMysqlRepository::class);
    }
}
