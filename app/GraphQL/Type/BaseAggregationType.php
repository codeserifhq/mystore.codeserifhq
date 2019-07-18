<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class BaseAggregationType extends GraphQLType
{
    protected $type;
    
    protected $description;

    public function fields()
    {
        return [
            'totalItems' => [
                'type'        => Type::int(),
                'description' => 'Total count for users query'
            ],
            'items' => [
                'type' =>  Type::listOf(GraphQL::type($this->type)),
                'description' => $this->description
            ]
        ];
    }
}