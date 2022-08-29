<?php
declare(strict_types=1);


namespace Tests\Utils\Traits;

trait UseFaker
{
    protected function faker(): \Faker\Generator
    {
        return $faker = \Faker\Factory::create();
    }
}
