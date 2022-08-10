<?php
declare(strict_types=1);


namespace App\Advertising\Entities;

class Photos
{

    public function __construct(private array $photos = [])
    {
    }

    /**
     * @return array
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }

    public function count(): int
    {
        return count($this->getPhotos());
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_map(fn($photo) => (string)$photo, $this->getPhotos());
    }

}
