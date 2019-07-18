<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\BaseAggregationType;

class PermissionModuleAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'PermissionModuleAgreggationType',
        'description' => 'A type'
    ];

    protected $type = 'permissionModule';
    protected $description = 'permission modules';
}