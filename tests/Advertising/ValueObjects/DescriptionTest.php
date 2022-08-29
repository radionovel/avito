<?php

namespace Tests\Advertising\ValueObjects;

use App\Advertising\ValueObjects\AdvertisingDescription;
use App\Advertising\ValueObjects\AdvertisingName;
use Tests\TestCase;

class DescriptionTest extends TestCase
{

    /**
     * @return void
     */
    public function testValidObject()
    {
        $description = str_repeat('a', 1000);
        $descriptionValueObject = new AdvertisingDescription($description);
        $this->assertEquals(
            $description, $descriptionValueObject->value()
        );
    }

    /**
     * @return void
     */
    public function testEmptyObject()
    {
        $descriptionValueObject = new AdvertisingDescription('');
        $this->assertEquals(
            '', $descriptionValueObject->value()
        );
    }

    /**
     * @return void
     */
    public function testLargeObject()
    {
        $this->expectException(\InvalidArgumentException::class);
        new AdvertisingDescription(str_repeat('a', 1001));
    }
}
