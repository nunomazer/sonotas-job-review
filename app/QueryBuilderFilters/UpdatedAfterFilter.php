<?php
namespace App\QueryBuilderFilters;

use Illuminate\Support\Facades\Log;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class UpdatedAfterFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $d = \Carbon\Carbon::createFromFormat('Y-m-d', $value)->startOfDay();
        $query->where('updated_at', '>=', $d);
        $query->withTrashed(); // @phpstan-ignore-line
        $query->orWhere('deleted_at', '>=', $d);
    }
}
