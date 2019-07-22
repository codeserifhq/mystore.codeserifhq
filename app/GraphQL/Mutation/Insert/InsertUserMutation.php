<?php

namespace App\GraphQL\Mutation\Insert;

use GraphQL\Type\Definition\Type;
use App\GraphQL\Mutation\Insert\BaseInsertMutation;

use App\Models\Company;
use App\Models\User;

use App\Contracts\Mutators\UserMutatorInterface as UserMutator;
use App\Rules\SuperAdminCompanyIdRule;
use App\Rules\UserNameUniqueRule;

class InsertUserMutation extends BaseInsertMutation
{
    protected $attributes = [
        'name' => 'InsertUserMutation',
        'description' => 'A mutation'
    ];

    protected $type = 'user';

    public function __construct(UserMutator $mutator) {
        $this->mutator = $mutator;
    }

    public function args()
    {
        return [
            'company_id' => [
                'name'  => 'company_id',
                'type'  => Type::int(),
                'rules' => ['exists:'.Company::getTableName().',id', new SuperAdminCompanyIdRule]
            ], 
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
            ], 
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
                'rules' => ['required', 'max:250', 'email', 'unique:'.User::getTableName()]
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::string(),
                'rules' => ['required', 'max:250']
            ]
        ];
    }

    public function rules(array $args = []) {
        return [
            'name' => [
                'required',
                new UserNameUniqueRule($args)
            ]
        ];
    }

}