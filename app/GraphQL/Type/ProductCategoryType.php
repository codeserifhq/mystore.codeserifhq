<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Models\ProductCategory;

class ProductCategoryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProductCategoryType',
        'description' => 'A type',
        'model' => ProductCategory::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the category',
            ],
            'parent_id' => [
                'type' => Type::int(),
                'description' => 'parent id of the category',
            ],
            'company_id' => [
                'type' => Type::int(),
                'description' => 'company id of the category',
            ],
            'company' => [
                'type' => GraphQL::type('company'),
                'description' => 'stockoutbound for this sale',
            ],
            'children' => [
                'type' => Type::listOf(GraphQL::type('productCategory')),
                'description' => 'stockoutbound for this sale',
            ],
            'parent' => [
                'type' => GraphQL::type('productCategory'),
                'description' => 'stockoutbound for this sale',
            ],
            'products' => [
                'type' => GraphQL::type('product'),
                'description' => 'products under this category',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'category name',
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'category description',
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'category created_at date',
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'category updated_at date',
            ],
        ];
    }
}