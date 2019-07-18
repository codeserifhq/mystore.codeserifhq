<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Models\Product;

class ProductType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProductType',
        'description' => 'A type',
        'model' => Product::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the product',
            ],
            'category_id' => [
                'type' => Type::int(),
                'description' => 'category_id assigned to this product',
            ],
            'company_id' => [
                'type' => Type::int(),
                'description' => 'company id assigned to this product',
            ],
            'company' => [
                'type' => GraphQL::type('company'),
                'description' => 'company assigned to this product',  
            ],
            'category' => [
                'type' => GraphQL::type('productCategory'),
                'description' => 'category assigned to this product',  
            ],
            'customProperties' => [
                'type' => Type::listOf(GraphQL::type('productCustomProperty')),
                'description' => 'product\'s custom properties',  
            ],
            'stockInbounds' => [
                'type' => Type::listOf(GraphQL::type('stockInbound')),
                'description' => 'product\'s stock inbounds',
            ],
            'stockOutbounds' => [
                'type' => Type::listOf(GraphQL::type('stockOutbound')),
                'description' => 'product\'s stock outbounds',
            ],
            'code' => [
                'type' => Type::string(),
                'description' => 'product code',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'product name',
            ],
            'unit' => [
                'type' => Type::string(),
                'description' => 'product unit',
            ],
            'unit_price' => [
                'type' => Type::int(),
                'description' => 'product unit price',
            ],
            'max_stock' => [
                'type' => Type::int(),
                'description' => 'max stock for this product',
            ],
            'stock_to_alert' => [
                'type' => Type::int(),
                'description' => 'stock for this product to alert',
            ],
            'remarks' => [
                'type' => Type::string(),
                'description' => 'product remarks',
            ],
            'alert' => [
                'type' => Type::boolean(),
                'description' => 'if product will alert',
            ],
            'expiration_date' => [
                'type' => Type::string(),
                'description' => 'product expiration date'
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'created at date of product'
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'updated at date of product'
            ]
        ];
    }
}