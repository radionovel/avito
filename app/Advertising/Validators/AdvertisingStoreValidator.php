<?php
declare(strict_types=1);


namespace App\Advertising\Validators;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;

class AdvertisingStoreValidator
{

    use ProvidesConvenienceMethods;

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

    /**
     * @throws ValidationException
     */
    public function validateRequest(Request $request): void
    {
        $this->validate($request, $this->rules(), $this->messages());
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:200',
            'description' => 'required|string|max:1000',
            'price' => 'numeric|min:0',
            'price.*' => 'string|url',
        ];
    }

    public function messages(): array
    {
        return [
            'name.*' => 'Name must be string and less then 200 characters',
            'description.*' => 'required|string|max:1000',
            'price.*' => 'numeric|min:0',
        ];
    }

}
