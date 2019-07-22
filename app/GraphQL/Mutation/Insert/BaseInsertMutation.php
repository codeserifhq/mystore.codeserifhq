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