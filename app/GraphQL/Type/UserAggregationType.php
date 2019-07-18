<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;

use App\GraphQL\Type\BaseAggregationType;

class UserAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'UserAggregationType',
        'description' => 'A type'
    ];

    protected $type = 'user';
    protected $description = 'users';
}