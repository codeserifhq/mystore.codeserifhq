<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Models\Company as CompanyModel;

class CompanyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Company',
        'description' => 'A type',
        'model'       => CompanyModel::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the company',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'Company name'
            ],
            'founder' => [
                'type' => Type::string(),
                'description' => 'Company founder'
            ],
            'logo_file_type' => [
                'type' => Type::string(),
                'description' => 'Company logo file type'
            ],
            'address' => [
                'type' => Type::string(),
                'description' => 'company address'
            ],
            'contact' => [
                'type' => Type::string(),
                'description' => 'company contact_no'
            ]
        ];
    }
}