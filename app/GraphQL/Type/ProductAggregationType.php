<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\BaseAggregationType;

class ProductAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'ProductAgreggationType',
        'description' => 'A type'
    ];

    protected $type = 'product';
    protected $description = 'products';
}