<?php

namespace Tests\Advertising\ValueObjects;

use App\Advertising\ValueObjects\AdvertisingPrice;
use Tests\TestCase;

class PriceTest extends TestCase
{
    /**
     * @return void
     *
     * @dataProvider validPrices
     */
    public function testValidObject(float $actual, float $expected)
    {
        $price = new AdvertisingPrice($actual);
        $this->assertEquals(
            $expected, $price->value()
        );
    }

    /**
     * @return array
     */
    public function validPrices(): array
    {
        return [
            [0, .0],
            [100, 100.0],
            [100.25, 100.25],
            [100.555, 100.56],
            [100.999, 101],
            [100.01, 100.01],
            [100.011, 100.01],
        ];
    }

    /**
     * @return void
     */
    public function testInvalidObject()
    {
        $this->expectException(\InvalidArgumentException::class);
        $price = new AdvertisingPrice(-10);
    }
}
