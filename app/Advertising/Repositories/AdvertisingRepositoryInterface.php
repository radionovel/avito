<?php
declare(strict_types=1);


namespace App\Advertising\Repositories;

use App\Advertising\Entities\Advertising;
use App\Advertising\Filters\AdvertisingFilter;
use App\Advertising\Responses\Exceptions\AdvertisingNotFound;
use App\Advertising\ValueObjects\AdvertisingId;

interface AdvertisingRepositoryInterface
{
    public function list(AdvertisingFilter $filter);

    /**
     * @param AdvertisingId $id
     * @return Advertising
     *
     * @throws AdvertisingNotFound
     */
    public function find(AdvertisingId $id): Advertising;

    public function create(Advertising $advertising): AdvertisingId;
}
