<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Models\Partner;

class PartnerType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PartnerType',
        'description' => 'A type',
        'model'       => Partner::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the partner',
            ],
            'user_id' => [
                'type' => Type::int(),
                'description' => 'The user_id of user connected to partner',
            ],
            'department_id' => [
                'type' => Type::int(),
                'description' => 'The id of department connected to partner',
            ],
            'manager_id' => [
                'type' => Type::int(),
                'description' => 'The id of partner connected to partner',
            ],
            'job_position' => [
                'type' => Type::int(),
                'description' => 'The id of job position connected to partner',
            ],
            'company_id' => [
                'type' => Type::int(),
                'description' => 'The id of company connected to partner',
            ],
            'company_id_internal' => [
                'type' => Type::int(),
                'description' => 'The id of company for internal in partner',
            ],
            'staff' => [
                'type' => Type::listOf(GraphQL::type('partner')),
                'description' => 'people under this partner',
            ],
            'contacts' => [
                'type' => Type::listOf(GraphQL::type('contact')),
                'description' => 'contacts of this partner',
            ],
            'manager' => [
                'type' => GraphQL::type('partner'),
                'description' => 'The manager assigned to this partner',
            ],
            'department' => [
                'type' => GraphQL::type('department'),
                'description' => 'The  department of partner',
            ],
            'job' => [
                'type' => GraphQL::type('job'),
                'description' => 'The job of partner',
            ],
            'user' => [
                'type' => GraphQL::type('user'),
                'description' => 'The  user connected to partner',
            ],
            'company' => [
                'type' => GraphQL::type('company'),
                'description' => 'The company of user connected to partner',
            ],
            'companyInternal' => [
                'type' => GraphQL::type('partner'),
                'description' => 'The company partner',
            ],
            'addresses' => [
                'type' => Type::listOf(GraphQL::type('address')),
                'description' => 'The addresses of this partner',
            ],
            'suppliedInbounds' => [
                'type' => Type::listOf(GraphQL::type('stockInbound')),
                'description' => 'inbounds done by this supplier',
            ], 
            'stockInbounds' => [
                'type' => Type::listOf(GraphQL::type('stockInbound')),
                'description' => 'inbounds done by this partner',
            ], 
            'stockOutbounds' => [
                'type' => Type::listOf(GraphQL::type('stockOutbound')),
                'description' => 'outbounds done by this partner',
            ],
            'company_name' => [
                'type' => Type::string(), 
                'description' => 'if a partner is a company, not an individual'
            ],
            'first_name' => [
                'type' => Type::string(), 
                'description' => 'individual\'s first name'
            ],
            'middle_name' => [
                'type' => Type::string(), 
                'description' => 'individual\'s middle name'
            ],
            'last_name' => [
                'type' => Type::string(), 
                'description' => 'individual\'s last name'
            ],
            'profile_image_type' => [
                'type' => Type::string(), 
                'description' => 'partner\'s profile image type'
            ],
            'birthdate' => [
                'type' => Type::string(), 
                'description' => 'partner\'s birthdate'
            ],
            'is_supplier' => [
                'type' => Type::boolean(), 
                'description' => 'checker if partner is supplier'
            ],
            'type' => [
                'type' => Type::int(), 
                'description' => 'checker if partner is individual or company'
            ],
            'created_at' => [
                'type' => Type::string(), 
                'description' => 'created_at date of partner'
            ],
            'updated_at' => [
                'type' => Type::string(), 
                'description' => 'updated_at date of partner'
            ]
        ];
    }
}