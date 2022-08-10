<?php
declare(strict_types=1);


namespace App\Advertising\Filters;

use Illuminate\Database\Query\Builder;

class AdvertisingSortFilter
{
    protected array $sortingFields = [
        'price', 'created_at'
    ];

    /**
     * @param Builder $builder
     * @param string $value
     * @return void
     */
    public function __invoke(Builder $builder, string $value): void
    {
        [$field, $direction] = explode('|', $value);
        if ($this->canBeSorted($field)) {
            $builder->orderBy($field, $direction ?? 'desc');
        }
    }

    /**
     * @param string $field
     * @return bool
     */
    private function canBeSorted(string $field): bool
    {
        return in_array($field, $this->sortingFields);
    }
}
