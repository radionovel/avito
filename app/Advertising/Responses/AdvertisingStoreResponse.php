<?php
declare(strict_types=1);


namespace App\Advertising\Responses;

use App\Advertising\ValueObjects\AdvertisingId;
use Illuminate\Http\JsonResponse;

class AdvertisingStoreResponse extends JsonResponse
{
    public static function create(AdvertisingId $id): JsonResponse
    {
        return new JsonResponse([
            'id' => $id->value()
        ], 201);
    }
}
