<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\BaseAggregationType;

class ContactAggregationType extends BaseAggregationType
{
    protected $attributes = [
        'name' => 'ContactAgreggationType',
        'description' => 'A type'
    ];

    protected $type = 'contact';
    protected $description = 'contacts';
}