<?php

namespace App\QueryFilters;
use App\QueryFilters\QueryFilterBase as Filter;

class Status extends Filter
{

    protected function applyFilters($builder, $args)
    {
        return $builder->where('status',request($this->filterName()));
    }

}