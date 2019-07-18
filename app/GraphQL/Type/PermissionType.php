<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Models\Permission;


class PermissionType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PermissionType',
        'description' => 'A type',
        'model'       => Permission::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the permission',
            ],
            'permission_module_id' => [
                'type' => Type::int(),
                'description' => 'The id of permission module connected to permission',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of permission',
            ],
            'alias' => [
                'type' => Type::string(),
                'description' => 'The alias of permission',
            ],
            'sequence_number' => [
                'type' => Type::int(),
                'description' => 'The sequence_number of permission for ordering purposes',
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