<?php
declare(strict_types=1);


namespace App\Advertising\ValueObjects;

use InvalidArgumentException;

class AdvertisingDescription extends ValueObject
{
    public function __construct(private string $description)
    {
        $this->validate();
    }

    private function validate()
    {
        if (mb_strlen($this->description) > 1000) {
            throw new InvalidArgumentException('The description cannot be longer than 1000 characters.');
        }
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->description;
    }

    public function __toString(): string
    {
        return $this->value();
    }
}
