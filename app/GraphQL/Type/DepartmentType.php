<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;

use App\Models\Department;
use GraphQL;

class DepartmentType extends GraphQLType
{
    protected $attributes = [
        'name' => 'DepartmentType',
        'description' => 'A type',
        'model'       => Department::class,
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