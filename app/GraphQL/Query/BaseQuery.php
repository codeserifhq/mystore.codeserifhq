<?php

namespace App\GraphQL\Query;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL;

class BaseQuery extends Query
{
    protected $repository;
    protected $type;
    protected $list = true;

    public function type()
    {
        if ($this->list) {
            return Type::listOf(GraphQL::type($this->type));
        } else {
            return GraphQL::type($this->type);
        }
    }

    public function args()
    {
        /**
         * Sample string for json query:
         * 
         * [
         *       [
         *           {
         *               "column": "first_name",
         *               "operator": "=",
         *               "value": "ephraim",
         *               "boolean_operator": "and"
         *           },
         *           {
         *               "column": "birthdate",
         *               "operator": ">",
         *               "value": "1995-04-01",
         *               "boolean_operator": "or"
         *           }
         *       ],
         *   {
         *           "column": "last_name",
         *           "operator": "LIKE",
         *           "value": "lambarte%",
         *           "boolean_operator": "or"
         *   }
         *   ]';
         */
        return [
            'json_query' => [
                'type' => Type::string(),
                'name' => 'json_query',
            ],
            'limit' => [
                'name' => 'limit', 
                'type' => Type::int()
            ],
            'page' => [
                'name' => 'page', 
                'type' => Type::int()
            ],
        ];
    }
    
    public function resolve($root, $args)
    {
        if ($this->list) {
            return $this->repository->getModelRecords($args);
        } else {
            return [
                'totalItems' => $this->repository->getAggregateBasedOnSearch($args),
                'items'      => $this->repository->getModelRecords($args)
            ];
        }
        
    }
}