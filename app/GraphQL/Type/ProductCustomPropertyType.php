<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Model\ProductCustomProperty;

class ProductCustomPropertyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProductCustomPropertyType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of custom property',
            ],
            'product_id' => [
                'type' => Type::int(),
                'description' => 'product this custom property belongs to',
            ],
            'product' => [
                'type' => GraphQL::type('product'),
                'description' => 'product this custom propert belongs to'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'name of custom property',
            ],
            'value' => [
                'type' => Type::string(),
                'description' => 'value of custom property',
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'created_at date of custom property',
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'updated_at date of custom property',
            ],
        ];
    }
}