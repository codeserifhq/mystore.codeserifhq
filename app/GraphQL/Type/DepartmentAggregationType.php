<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\BaseAggregationType;

class DepartmentAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'DepartmentAgreggationType',
        'description' => 'A type'
    ];

    protected $type = 'department';
    protected $description = 'departments';
}