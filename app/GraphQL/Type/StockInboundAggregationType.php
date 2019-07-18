<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\BaseAggregationType;

class StockInboundAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'StockInboundAggregationType',
        'description' => 'A type'
    ];

    protected $type = 'stockInbound';
    protected $description = 'stock inbounds';
}