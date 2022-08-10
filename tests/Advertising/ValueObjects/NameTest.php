<?php

namespace Tests\Advertising\ValueObjects;

use App\Advertising\ValueObjects\AdvertisingName;
use Tests\TestCase;

class NameTest extends TestCase
{

    /**
     * @return void
     */
    public function testValidObject()
    {
        $name = str_repeat('a', 200);
        $nameValueObject = new AdvertisingName($name);
        $this->assertEquals(
            $name, $nameValueObject->value()
        );
    }

    /**
     * @return void
     */
    public function testEmptyObject()
    {
        $this->expectException(\InvalidArgumentException::class);
        new AdvertisingName('');
    }

    /**
     * @return void
     */
    public function testLargeObject()
    {
        $this->expectException(\InvalidArgumentException::class);
        new AdvertisingName($name = str_repeat('a', 201));
    }
}
