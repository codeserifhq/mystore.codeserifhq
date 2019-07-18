<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;

use App\Models\Address;

class AddressType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AddressType',
        'description' => 'A type',
        'model' => Address::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the address',
            ],
            'partner_id' => [
                'type' => Type::int(),
                'description' => 'The partner_id of the address',
            ], 
            'partner' =>  [
                'type' => GraphQL::type('partner'),
                'description' => 'The partner assigned to this address',
            ],
            'label' => [
                'type' => Type::string(),
                'description' => 'The label of the address',
            ],
            'address_line' => [
                'type' => Type::string(),
                'description' => 'address line',
            ]

        ];
    }
}