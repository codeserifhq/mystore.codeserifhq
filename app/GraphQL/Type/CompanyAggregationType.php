<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\BaseAggregationType;

class CompanyAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'CompanyAgreggationType',
        'description' => 'A type'
    ];

    protected $type = 'company';
    protected $description = 'companies';
}