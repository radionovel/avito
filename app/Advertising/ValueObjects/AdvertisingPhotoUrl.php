<?php
declare(strict_types=1);


namespace App\Advertising\ValueObjects;

use InvalidArgumentException;

class AdvertisingPhotoUrl extends ValueObject
{
    /**
     * @param string $photoUrl
     */
    public function __construct(private string $photoUrl)
    {
        $this->validate();
    }

    /**
     * @return void
     */
    private function validate(): void
    {
        if (!filter_var($this->photoUrl, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException(
                sprintf('Photos URL is not a valid URL (%s)', $this->photoUrl)
            );
        }
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->photoUrl;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value();
    }
}
