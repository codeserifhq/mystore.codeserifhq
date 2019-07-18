<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\BaseAggregationType;

class SaleAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'SaleAgreggationType',
        'description' => 'A type'
    ];

    protected $type = 'sale';
    protected $description = 'sales';
}