<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Models\Role;

class RoleType extends GraphQLType
{
    protected $attributes = [
        'name' => 'RoleType',
        'description' => 'A type',
        'model'       => Role::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the role',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of role',
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of role',
            ],
            'company' => [
                'type' => Type::listOf(GraphQL::type('company')),
                'description' => 'company this role belongs to',
            ],
            'permissions' => [
                'type' => Type::listOf(GraphQL::type('permission')),
                'description' => 'permissions of this role',
            ]
        ];
    }
}