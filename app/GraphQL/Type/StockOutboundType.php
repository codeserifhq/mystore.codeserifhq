<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;

use App\Models\StockOutbound;

class StockOutboundType extends GraphQLType
{
    protected $attributes = [
        'name' => 'StockOutboundType',
        'description' => 'A type',
        'model' => StockOutbound::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the stock outbound',
            ],
            'sale_id' => [
                'type' => Type::int(),
                'description' => 'sale id responsible for this outbound',
            ],
            'stock_out_by' => [
                'type' => Type::int(),
                'description' => 'The id of the partner responsible for this stock outbound',
            ],
            'branch_id' => [
                'type' => Type::int(),
                'description' => 'branch id that produced this outbound',
            ],
            'stock_out_date' => [
                'type' => Type::string(),
                'description' => 'date outbounded',
            ],
            'products' => [
                'type' => Type::listOf(GraphQL::type('product')),
                'description' => 'products for this outbound',
            ],
            'sale' => [
                'type' => GraphQL::type('sale'),
                'description' => 'products for this outbound',
            ],
            'reason' => [
                'type' => Type::string(),
                'description' => 'reason for outbound',
            ]
        ];
    }
}