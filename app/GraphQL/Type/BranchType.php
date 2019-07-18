<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;

use App\Models\Branch;

class BranchType extends GraphQLType
{
    protected $attributes = [
        'name' => 'BranchType',
        'description' => 'A type',
        'model' => Branch::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of branch',
            ],
            'company_id' => [
                'type' => Type::int(),
                'description' => 'The company id  assinged to branch',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'branch name',
            ],
            'address' => [
                'type' => Type::string(),
                'description' => 'branch address',
            ],
            'contact_no' => [
                'type' => Type::string(),
                'description' => 'branch contact no',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'branch email',
            ],
            'company' => [
                'type' => GraphQL::type('company'),
                'description' => 'which company this inbound belongs to',
            ],
            'stockInbounds' => [
                'type' => Type::listOf(GraphQL::type('stockInbound')),
                'description' => 'stock inbounds of this branch',
            ],
            'stockOutbounds' => [
                'type' => Type::listOf(GraphQL::type('stockOutbound')),
                'description' => 'stock outbounds of this branch',
            ]
        ];
    }
}