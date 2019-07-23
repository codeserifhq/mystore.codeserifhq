<?php

namespace App\GraphQL\Mutation\Auth;

use Rebing\GraphQL\Support\Mutation;
use GraphQL;

class SignOutMutation extends Mutation
{
    protected $attributes = [
        'name' => 'SignOut',
        'description' => 'sign out mutation'
    ];

    public function type()
    {
        return GraphQL::type('user');
    }

    public function args()
    {
        return [

        ];
    }

    public function resolve()
    {
        $user = auth()->guard('api')->user();
        auth()->guard('api')->user()->OauthAcessToken()->delete();
        return $user;
    }
}