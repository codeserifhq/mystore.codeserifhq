<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\BaseAggregationType;

class StockOutboundAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'StockOutboundAggregationType',
        'description' => 'A type'
    ];

    protected $type = 'stockOutbound';
    protected $description = 'stock outbounds';
}