<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;

use App\Models\StockInbound;

class StockInboundType extends GraphQLType
{
    protected $attributes = [
        'name' => 'StockInboundType',
        'description' => 'A type',
        'model' => StockInbound::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the stock inbound',
            ],
            'supplier_id' => [
                'type' => Type::int(),
                'description' => 'id of supplier for inbound',
            ],
            'stock_in_by' => [
                'type' => Type::int(),
                'description' => 'partner id that received this inbound',
            ],
            'stock_in_branch_id' => [
                'type' => Type::int(),
                'description' => 'branch id that received this inbound',
            ],
            'stock_outbound_id' => [
                'type' => Type::int(),
                'description' => 'outbound id that is responsible for this inbound',
            ],
            'branch' => [
                'type' => GraphQL::type('branch'),
                'description' => 'branch where this is inbounded',
            ],
            'products' => [
                'type' => Type::listOf(GraphQL::type('product')),
                'description' => 'products for this outbound',
            ],
            'stockOutbound' => [
                'type' => GraphQL::type('stockOutbound'),
                'description' => 'stock outbound responsible for this inbound',
            ],
            'stockInboundBy' => [
                'type' => GraphQL::type('partner'),
                'description' => 'partner responsible for this inbound',
            ],
            'supplier' => [
                'type' => GraphQL::type('partner'),
                'description' => 'supplier for this inbound',
            ],
            'receipt_no' => [
                'type' => Type::string(),
                'description' => 'receipt no of inbound',
            ],
            'receipt_date' => [
                'type' => Type::string(),
                'description' => 'receipt date of inbound',
            ],
            'inbound_date' => [
                'type' => Type::string(),
                'description' => 'date inbounded',
            ],
            'remarks' => [
                'type' => Type::string(),
                'description' => 'inbound remarks',
            ]
        ];
    }
}