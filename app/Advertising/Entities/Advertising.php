<?php
declare(strict_types=1);

namespace App\Advertising\Entities;

use App\Advertising\ValueObjects\AdvertisingDescription;
use App\Advertising\ValueObjects\AdvertisingId;
use App\Advertising\ValueObjects\AdvertisingName;
use App\Advertising\ValueObjects\AdvertisingPrice;
use InvalidArgumentException;

class Advertising
{
    /**
     * @param AdvertisingId $id
     * @param AdvertisingName $name
     * @param AdvertisingDescription $description
     * @param Photos $photos
     * @param AdvertisingPrice $price
     */
    public function __construct(private AdvertisingId          $id,
                                private AdvertisingName        $name,
                                private AdvertisingDescription $description,
                                private AdvertisingPrice       $price,
                                private Photos                 $photos)
    {
        if ($this->photos->count() > 3) {
            throw new InvalidArgumentException('You can add only three photos');
        }
    }

    /**
     * @return AdvertisingId
     */
    public function getId(): AdvertisingId
    {
        return $this->id;
    }

    /**
     * @return AdvertisingName
     */
    public function getName(): AdvertisingName
    {
        return $this->name;
    }

    /**
     * @return AdvertisingDescription
     */
    public function getDescription(): AdvertisingDescription
    {
        return $this->description;
    }

    /**
     * @return Photos
     */
    public function getPhotos(): Photos
    {
        return $this->photos;
    }

    /**
     * @return AdvertisingPrice
     */
    public function getPrice(): AdvertisingPrice
    {
        return $this->price;
    }
}
