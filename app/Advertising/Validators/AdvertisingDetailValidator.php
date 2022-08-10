<?php
declare(strict_types=1);


namespace App\Advertising\Validators;

use App\Advertising\ValueObjects\AdvertisingId;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AdvertisingDetailValidator
{

    public function __construct(protected Request $request)
    {
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    public function validateId(string $id): void
    {
        try {
            AdvertisingId::fromString($id);
        } catch (\InvalidArgumentException $exception) {
            throw new HttpException(422, 'Не корректный ID объявления');
        }
    }
}
