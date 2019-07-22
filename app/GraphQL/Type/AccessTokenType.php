<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use GraphQL;

class AccessTokenType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AccessTokenType',
        'description' => 'A type users access token information'
    ];

    public function fields()
    {
        return [
            'token_type' => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'token type',
            ],
            
            'expires_in' => [
                'type'        => Type::nonNull(Type::int()),
                'description' => 'expiration date',
            ],
            'access_token' => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'access token of the user',
            ],
            'refresh_token' => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'refresh token of the user'
            ],
            'user' => [
                'type'        => GraphQL::type('user'),
                'description' => 'user for token'
            ]
        ];
    }
}