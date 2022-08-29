<?php
declare(strict_types=1);


namespace App\Advertising\Factories;

use App\Advertising\Entities\Advertising;
use App\Advertising\Entities\Photos;
use App\Advertising\Models\AdvertisingModel;
use App\Advertising\ValueObjects\AdvertisingDescription;
use App\Advertising\ValueObjects\AdvertisingId;
use App\Advertising\ValueObjects\AdvertisingName;
use App\Advertising\ValueObjects\AdvertisingPhotoUrl;
use App\Advertising\ValueObjects\AdvertisingPrice;

class AdvertisingFactory
{
    /**
     * @param array $data
     * @return Advertising
     */
    public static function createFromArray(array $data): Advertising
    {
        $photos = array_map(fn($photo) => new AdvertisingPhotoUrl($photo), $data['photos']);

        return new Advertising(
            isset($data['id']) ? AdvertisingId::fromString($data['id']) : AdvertisingId::next(),
            new AdvertisingName($data['name']),
            new AdvertisingDescription($data['description']),
            new AdvertisingPrice((float)$data['price']),
            new Photos($photos)
        );
    }

    /**
     * @param AdvertisingModel $model
     * @return Advertising
     */
    public static function createFromModel(AdvertisingModel $model): Advertising
    {
        return self::createFromArray($model->toArray());
    }
}
