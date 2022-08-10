<?php
declare(strict_types=1);


namespace App\Advertising\ValueObjects;

use JsonSerializable;

abstract class ValueObject implements JsonSerializable
{
    public function jsonSerialize()
    {
        if (method_exists($this, 'toArray')) {
            return $this->toArray();
        }

        if (method_exists($this, '__toString')) {
            return $this->__toString();
        }

        return '';
    }

}
