<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;

use App\Models\Contact;

class ContactType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ContactType',
        'description' => 'A type',
        'model' => Contact::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the contact',
            ],
            'group' => [
                'type' => Type::int(),
                'description' => 'if contact is for work or for personal',
            ],
            'label' => [
                'type' => Type::string(),
                'description' => 'label of contact',
            ],
            'info' => [
                'type' => Type::string(),
                'description' => 'info of contact',
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'created_at date of contact',
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'updated_at date of contact',
            ],
        ];
    }
}