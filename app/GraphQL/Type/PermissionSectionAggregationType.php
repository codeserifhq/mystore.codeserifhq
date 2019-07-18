<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\BaseAggregationType;

class PermissionSectionAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'PermissionSectionAgreggationType',
        'description' => 'A type'
    ];

    protected $type = 'permissionSection';
    protected $description = 'permission sectionss';
}