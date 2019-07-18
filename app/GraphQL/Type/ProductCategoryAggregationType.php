<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\BaseAggregationType;

class ProductCategoryAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'CategoryAgreggationType',
        'description' => 'A type'
    ];

    protected $type = 'category';
    protected $description = 'categories';
}