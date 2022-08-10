<?php
declare(strict_types=1);


namespace App\Advertising\Filters;

use Ambengers\QueryFilter\AbstractQueryFilter;

class AdvertisingFilter extends AbstractQueryFilter
{
    protected $filters = [
        'sort' => AdvertisingSortFilter::class,
    ];
}
