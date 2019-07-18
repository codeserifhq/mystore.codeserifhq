<?php

namespace App\GraphQL\Query;

use GraphQL\Type\Definition\Type;
use App\GraphQL\Query\BaseQuery;
use App\Contracts\Repositories\UserRepositoryInterface as UserRepository;


class UserQuery extends BaseQuery
{
    protected $attributes = [
        'name' => 'Users query'
    ];
    protected $type = 'userAggregationType';
    protected $list = false;

    public function __construct(UserRepository $users)
    {
        $this->repository = $users;
    }
}