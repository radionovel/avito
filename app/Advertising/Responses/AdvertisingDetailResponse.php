<?php
declare(strict_types=1);


namespace App\Advertising\Responses;

use App\Advertising\Entities\Advertising;
use Illuminate\Http\JsonResponse;

class AdvertisingDetailResponse
{
    public static function create(Advertising $advertising, array $optionalFields = []): JsonResponse
    {
        $data = [
            'id' => $advertising->getId(),
            'name' => $advertising->getName(),
            'price' => $advertising->getPrice(),
        ];

        $photos = $advertising->getPhotos()->toArray();
        if (count($photos) > 0) {
            $data['mainPhoto'] = $photos[0];
        }

        if (in_array('description', $optionalFields)) {
            $data['description'] = $advertising->getDescription();
        }

        if (in_array('photos', $optionalFields)) {
            $data['photos'] = $photos;
        }

        return new JsonResponse($data);
    }
}
