<?php
declare(strict_types=1);


namespace App\Advertising\Models;

use App\Advertising\Entities\Advertising;
use App\Advertising\Factories\AdvertisingFactory;
use App\Advertising\Filters\AdvertisingFilter;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $attributes = [])
 * @method static find(string $id)
 * @method mixed filter(AdvertisingFilter $filter)
 */
class AdvertisingModel extends Model
{
    protected $table = 'advertising';

    protected $fillable = [
        'id', 'name', 'description', 'price', 'photos',
    ];

    protected $casts = [
        'photos' => 'array'
    ];

    public function toEntity(): Advertising
    {
        return AdvertisingFactory::createFromModel($this);
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }
}
