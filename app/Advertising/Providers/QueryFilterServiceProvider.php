<?php
declare(strict_types=1);


namespace App\Advertising\Providers;

use Ambengers\QueryFilter\AbstractQueryLoader;
use Ambengers\QueryFilter\RequestQueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class QueryFilterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->bootEloquentFilterMacro();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../../config/query_filter.php',
            'query-filter-config'
        );
    }

    /**
     * @return void
     */
    protected function bootEloquentFilterMacro(): void
    {
        $method = config('query_filter.method', 'filter');
        Builder::macro($method, function (RequestQueryBuilder $filters) {
            if ($filters instanceof AbstractQueryLoader) {
                return $filters->getFilteredModel($this);
            }

            if ($filters->shouldPaginate()) {
                return $filters->getPaginated($this);
            }

            return $filters->getFilteredModelCollection($this);
        });
    }
}
