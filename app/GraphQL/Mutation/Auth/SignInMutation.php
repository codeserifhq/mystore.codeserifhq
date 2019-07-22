<?php

namespace App\GraphQL\Mutation\Auth;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

use App\Models\User;

class SignInMutation extends Mutation
{
    protected $attributes = [
        'name'        => 'SignInMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('accessToken');
    }

    public function args()
    {
        return [
            'username'  => [
                'name'  => 'username',      
                'type'  => Type::nonNull(Type::string()),
                'rules' => ['required', 'email']
            ],
            'password'  => [
                'name'  => 'password',      
                'type'  => Type::nonNull(Type::string()),
                'rules' => ['required']
            ],
            'client_id' => [
                'name'  => 'client_id',      
                'type'  => Type::string()
            ],
            'client_secret' => [
                'name'  => 'client_secret',      
                'type'  => Type::string()
            ]
        ];
    }

    public function resolve($root, $args)
    {
       
        $credentials = [
            'client_id'     => isset($args['client_id']) ? $args['client_id'] : env('PASSPORT_CLIENT_ID'),
            'client_secret' => isset($args['client_id']) ? $args['client_secret'] : env('PASSPORT_CLIENT_SECRET'),
            'grant_type'    => 'password',
            'username'      => $args['username'],
            'password'      => $args['password']
        ];

        $token = $this->makeRequest($credentials);
        
        $user = User::where('email', $args['username'])->first();

        $token["user"] = $user; //return currently authenticated user

        return $token;

    }

    public function makeRequest(array $credentials)
    {
        $request = Request::create('oauth/token', 'POST', $credentials, [], [], [
            'HTTP_Accept' => 'application/json'
        ]);

        $response = app()->handle($request);
        $decodedResponse = json_decode($response->getContent(), true);
        if ($response->getStatusCode() != 200) {
            throw new AuthenticationException($decodedResponse['message']);
        }
        
        return $decodedResponse;
    }
}