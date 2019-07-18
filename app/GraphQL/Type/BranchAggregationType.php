<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\BaseAggregationType;

class BranchAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'BranchAgreggationType',
        'description' => 'A type'
    ];

    protected $type = 'branch';
    protected $description = 'branches';
}