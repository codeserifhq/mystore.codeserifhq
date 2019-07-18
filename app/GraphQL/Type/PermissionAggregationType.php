<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;

use App\GraphQL\Type\BaseAggregationType;

class PermissionAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'PermissionAgreggationType',
        'description' => 'A type'
    ];

    protected $type = 'permission';
    protected $description = 'permissions';
}