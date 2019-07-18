<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\BaseAggregationType;

class PartnerAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'PartnerAgreggationType',
        'description' => 'A type'
    ];

    protected $type = 'partner';
    protected $description = 'partners';
}