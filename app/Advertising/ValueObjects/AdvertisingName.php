<?php
declare(strict_types=1);


namespace App\Advertising\ValueObjects;

use InvalidArgumentException;

class AdvertisingName extends ValueObject
{
    public function __construct(private string $name)
    {
        $this->validate();
    }

    private function validate()
    {
        if (mb_strlen($this->name) > 200) {
            throw new InvalidArgumentException('The name cannot be longer than 200 characters.');
        }

        if (mb_strlen($this->name) === 0) {
            throw new InvalidArgumentException('The name cannot be empty.');
        }
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->value();
    }
}
