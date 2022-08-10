<?php
declare(strict_types=1);


namespace App\Advertising\Repositories;

use App\Advertising\Entities\Advertising;
use App\Advertising\Filters\AdvertisingFilter;
use App\Advertising\Models\AdvertisingModel;
use App\Advertising\Responses\Exceptions\AdvertisingNotFound;
use App\Advertising\ValueObjects\AdvertisingId;

class AdvertisingMysqlRepository implements AdvertisingRepositoryInterface
{
    const PER_PAGE = 2;

    /**
     * @param AdvertisingFilter $filter
     * @return mixed
     */
    public function list(AdvertisingFilter $filter): mixed
    {
        return AdvertisingModel::filter($filter);
    }

    /**
     * @param AdvertisingId $id
     * @return Advertising
     * @throws AdvertisingNotFound
     */
    public function find(AdvertisingId $id): Advertising
    {
        $advertising = AdvertisingModel::find($id->value());
        if (is_null($advertising)) {
            throw new AdvertisingNotFound(
                sprintf('Advertising [%s] not found', $id)
            );
        }

        return $advertising->toEntity();
    }

    /**
     * @param Advertising $advertising
     * @return AdvertisingId
     */
    public function create(Advertising $advertising): AdvertisingId
    {
        $model = AdvertisingModel::create([
            'id' => $advertising->getId()->value(),
            'name' => $advertising->getName()->value(),
            'description' => $advertising->getDescription()->value(),
            'price' => $advertising->getPrice()->value(),
            "photos" => $advertising->getPhotos()->toArray(),
        ]);

        return AdvertisingId::fromString($model->id);
    }
}
