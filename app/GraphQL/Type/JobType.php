<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;

use App\Models\JobPosition;

class JobType extends GraphQLType
{
    protected $attributes = [
        'name' => 'JobType',
        'description' => 'A type',
        'model'       => JobPosition::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the company',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of department',
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of department',
            ],
            'partners' => [
                'type' => Type::listOf(GraphQL::type('partner')),
                'description' => 'The partners under this department',
            ]
        ];
    }
}