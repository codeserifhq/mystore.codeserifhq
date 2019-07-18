<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Models\Sale;

class SaleType extends GraphQLType
{
    protected $attributes = [
        'name' => 'SaleType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the permission',
            ],
            'sold_by' => [   
                'type' => Type::int(),
                'description' => 'id of seller',
            ],
            'stockOutbound' => [
                'type' => GraphQL::type('stockOutbound'),
                'description' => 'stockoutbound for this sale',
            ],
            'seller' => [   
                'type' => GraphQL::type('partner'),
                'description' => 'seller of this sale',
            ],
            'sold_date' => [
                'type' => Type::string(),
                'description' => 'date sold',
            ],
            'sub_total' => [
                'type' => Type::int(),
                'description' => 'sub total amount',
            ],
            'discount' => [
                'type' => Type::int(),
                'description' => 'discount',
            ],
            'total' => [
                'type' => Type::int(),
                'description' => 'total',
            ],
            'cash' => [
                'type' => Type::int(),
                'description' => 'cash paid',
            ],
            'change' => [
                'type' => Type::int(),
                'description' => 'change paid',
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'date created',
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'date_updated',
            ],
        ];
    }
}