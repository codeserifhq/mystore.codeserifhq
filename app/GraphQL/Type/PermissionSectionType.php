<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Models\PermissionSection;

class PermissionSectionType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PermissionSectionType',
        'description' => 'A type',
        'model'       => PermissionSection::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the permission section',
            ],
            'permissionModules' => [
                'type' => Type::listOf(GraphQL::type('permissionModule')),
                'description' => 'Permission Modules',
            ],
            'permissions' => [
                'type' => Type::listOf(GraphQL::type('permission')),
                'description' => 'Permissions',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of permission section',
            ],
            'alias' => [
                'type' => Type::string(),
                'description' => 'The alias of permission section',
            ],
            'sequence_number' => [
                'type' => Type::int(),
                'description' => 'The sequence of permission section for ordering purposes',
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'created_at date of permission',
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'updated_at date of permission',
            ]
        ];
    }
}