<?php

namespace App\GraphQL\Mutation\Update;

use Rebing\GraphQL\Support\Mutation;
use GraphQL;

class BaseUpdateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateMutation',
        'description' => 'A mutation'
    ];

    protected $mutator;
    protected $type;
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
        $result = $this->mutator->updateModel($args);
        return $result;
    }
}