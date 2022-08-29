<?php

namespace Tests\Advertising\ValueObjects;

use App\Advertising\ValueObjects\AdvertisingPhotoUrl;
use App\Advertising\ValueObjects\AdvertisingPrice;
use Tests\TestCase;

class PhotoUrlTest extends TestCase
{
    /**
     * @return void
     *
     * @dataProvider validUrls
     */
    public function testValidObject(string $url)
    {
        $photoUrl = new AdvertisingPhotoUrl($url);
        $this->assertEquals(
            $url, $photoUrl->value()
        );
    }

    /**
     * @return array
     */
    public function validUrls(): array
    {
        return [
            ['http://foo.com/blah_blah'],
            ['http://foo.com/blah_blah/'],
            ['http://foo.com/blah_blah_(wikipedia)'],
            ['http://foo.com/blah_blah_(wikipedia)_(again)'],
            ['http://www.example.com/wpstyle/?p=364'],
            ['https://www.example.com/foo/?bar=baz&inga=42&quux'],
            ['http://userid:password@example.com:8080'],
            ['http://userid:password@example.com:8080/'],
            ['http://userid@example.com'],
            ['http://userid@example.com/'],
            ['http://userid@example.com:8080'],
            ['http://userid@example.com:8080/'],
            ['http://userid:password@example.com'],
            ['http://userid:password@example.com/'],
            ['http://142.42.1.1/'],
            ['http://142.42.1.1:8080/'],
            ['http://foo.com/blah_(wikipedia)#cite-1'],
            ['http://foo.com/blah_(wikipedia)_blah#cite-1'],
            ['http://foo.com/(something)?after=parens'],
            ['http://code.google.com/events/#&product=browser'],
            ['http://j.mp'],
            ['ftp://foo.bar/baz'],
            ['http://foo.bar/?q=Test%20URL-encoded%20stuff'],
            ['http://1337.net'],
            ['http://a.b-c.de'],
            ['http://223.255.255.254'],
        ];
    }

    /**
     * @return void
     *
     * @dataProvider invalidUrls
     */
    public function testInvalidObject(string $url)
    {
        $this->expectException(\InvalidArgumentException::class);
        new AdvertisingPhotoUrl($url);
    }

    public function invalidUrls(): array
    {
        return [
            ['http://'],
            ['http://.'],
            ['http://..'],
            ['http://../'],
            ['http://?'],
            ['http://??'],
            ['http://??/'],
            ['http://#'],
            ['http://##'],
            ['http://##/'],
            ['//'],
            ['//a'],
            ['///a'],
            ['///'],
            ['http:///a'],
            ['rdar://1234'],
            ['h://test'],
            ['http:// shouldfail.com'],
            [':// should fail'],
            ['http://-error-.invalid/'],
            ['http://a.b--c.de/'],
            ['http://-a.b.co'],
            ['http://a.b-.co'],
        ];
    }
}
