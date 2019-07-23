<?php

namespace App\GraphQL\Mutation\Insert;

use Rebing\GraphQL\Support\Mutation;
use GraphQL;

class BaseInsertMutation extends Mutation
{
    protected $attributes = [
        'name' => 'BaseInsertMutation',
        'description' => 'A mutation'
    ];

    protected $type;
    protected $mutator;    
    protected $permissionAlias;

    public function authorize(array $args): bool
    {
        return auth()->guard('api')->user()->can($this->permissionAlias);
    }

    public function type()
    {
        return GraphQL::type($this->type);
    }

    public function args()
    {
        return [

        ];
    }

    public function resolve($root, $args)
    {
        return $this->mutator->insertModel($args);
    }
}