<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\BaseAggregationType;

class AddressAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'AddressAgreggationType',
        'description' => 'A type'
    ];

    protected $type = 'address';
    protected $description = 'addresses';
}