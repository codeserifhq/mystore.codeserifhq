<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Models\PermissionModule;

class PermissionModuleType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PermissionModuleType',
        'description' => 'A type',
        'model'       => PermissionModule::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the permission module',
            ],
            'permission_section_id' => [
                'type' => Type::int(),
                'description' => 'The id of the permission section connection to permission module',
            ],
            'permissionSection' => [
                'type' => GraphQL::type('permissionSection'),
                'description' => 'Permission Section',
            ],
            'permissions' => [
                'type' => Type::listOf(GraphQL::type('permission')),
                'description' => 'Permissions',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of permission module',
            ],
            'alias' => [
                'type' => Type::string(),
                'description' => 'The alias of permission module',
            ],
            'sequence_number' => [
                'type' => Type::int(),
                'description' => 'The sequence of permission module for ordering purposes',
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