<?php
declare(strict_types=1);


namespace App\Advertising\Controllers;

use App\Advertising\Factories\AdvertisingFactory;
use App\Advertising\Filters\AdvertisingFilter;
use App\Advertising\Repositories\AdvertisingRepositoryInterface;
use App\Advertising\Responses\AdvertisingDetailResponse;
use App\Advertising\Responses\AdvertisingStoreResponse;
use App\Advertising\Responses\Exceptions\AdvertisingNotFound;
use App\Advertising\Validators\AdvertisingDetailValidator;
use App\Advertising\Validators\AdvertisingStoreValidator;
use App\Advertising\ValueObjects\AdvertisingId;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class AdvertisingController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function store(AdvertisingStoreValidator $validator, AdvertisingRepositoryInterface $repository): JsonResponse
    {
        $validator->validateRequest($validator->getRequest());

        $id = $repository->create(
            AdvertisingFactory::createFromArray($validator->getRequest()->toArray())
        );

        return AdvertisingStoreResponse::create($id);
    }

    /**
     * @param string $id
     * @param AdvertisingDetailValidator $validator
     * @param AdvertisingRepositoryInterface $repository
     * @return JsonResponse
     */
    public function detail(string $id,
                           AdvertisingDetailValidator $validator,
                           AdvertisingRepositoryInterface $repository): JsonResponse
    {
        $validator->validateId($id);

        try {
            $advertising = $repository->find(
                AdvertisingId::fromString($id)
            );

            $optionalFields = $validator->getRequest()->get('fields', '');
            return AdvertisingDetailResponse::create($advertising, explode(',', $optionalFields));
        } catch (AdvertisingNotFound $exception) {
            throw new NotFoundHttpException('Объявление не найдено');
        }
    }

    /**
     * @param AdvertisingFilter $filter
     * @param AdvertisingRepositoryInterface $repository
     * @return JsonResponse
     */
    public function list(AdvertisingFilter $filter, AdvertisingRepositoryInterface $repository): JsonResponse
    {
        $items = $repository->list($filter);
        return response()->json($items);
    }
}
