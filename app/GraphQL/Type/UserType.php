<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;

use App\Models\User;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name'        => 'User',
        'description' => 'A user',
        'model'       => User::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user',
            ],
            'permissions' => [   
                'type' => Type::listOf(GraphQL::type('permission')),
                'description' => 'User Permissions',
            ],
            'company' => [
                'type' => GraphQL::type('company'),
                'description' => 'user company',
            ],
            'partner' => [
                'type' => GraphQL::type('partner'),
                'description' => 'user\'s partner',
            ],
            'company_id' => [
                'type' => Type::int(),
                'description' => 'The company id of the user',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the user',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of the user',
            ],
            'email_verified_at' => [
                'type' => Type::string(),
                'description' => 'date when the email is verified',
            ],
            'password' => [
                'type' => Type::string(),
                'description' => 'password of user',
            ],
            'superadmin' => [
                'type' => Type::boolean(),
                'description' => 'check if user is superadmin',
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'created_at date of user',
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'updated_at date of user',
            ],
        ];
    }
}