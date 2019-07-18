<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\BaseAggregationType;

class JobAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'JobAgreggationType',
        'description' => 'A type'
    ];

    protected $type = 'job';
    protected $description = 'jobs';
}