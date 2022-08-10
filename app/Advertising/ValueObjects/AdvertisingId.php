<?php
declare(strict_types=1);


namespace App\Advertising\ValueObjects;

use InvalidArgumentException;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class AdvertisingId extends ValueObject
{
    protected UuidInterface $id;

    /**
     * @param UuidInterface $id
     */
    private function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    /**
     * @param string $id
     * @return static
     */
    public static function fromString(string $id): static
    {
        try {
            return new static(Uuid::fromString($id));
        } catch (InvalidUuidStringException $exception) {
            throw new InvalidArgumentException($id);
        }
    }

    /**
     * @return static
     */
    public static function next(): static
    {
        return new static(Uuid::uuid4());
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->id->toString();
    }

    /**
     * @param AdvertisingId $id
     * @return bool
     */
    public function equalTo(AdvertisingId $id): bool
    {
        return $this->value() === $id->value();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value();
    }
}
