<?php
declare(strict_types=1);


namespace App\Advertising\ValueObjects;

use InvalidArgumentException;

class AdvertisingPrice extends ValueObject
{
    /**
     * @param float $price
     */
    public function __construct(private float $price)
    {
        $this->validate();
    }

    /**
     * @return void
     */
    private function validate(): void
    {
        if ($this->price < 0) {
            throw new InvalidArgumentException('Price cannot be less than 0');
        }
    }

    /**
     * @return float
     */
    public function value(): float
    {
        return round($this->price, 2);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->value();
    }

    /**
     * @return float
     */
    public function jsonSerialize(): float
    {
        return $this->value();
    }
}
