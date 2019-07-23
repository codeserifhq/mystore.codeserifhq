<?php

namespace App\GraphQL\Mutation\Update;

use GraphQL\Type\Definition\Type;

use App\Models\User;
use App\Models\Customer;
use App\Models\Company;

use App\GraphQL\Mutation\Update\BaseUpdateMutation;
use App\Rules\UserNameUniqueRule;
use App\Enums\UserSectionPermissionAliasEnum;
use App\Contracts\Mutators\UserMutatorInterface as UserMutator;

class UpdateUserMutation extends BaseUpdateMutation
{
    protected $attributes = [
        'name' => 'UpdateUserMutation',
        'description' => 'A mutation'
    ];
    protected $type = 'user';
    protected $permissionAlias = UserSectionPermissionAliasEnum::EDIT_USER;

    public function __construct(UserMutator $mutator) {
        $this->mutator = $mutator;
    }


    public function args()
    {
        return [
            'id' => [
                'name'  => 'id',
                'type'  => Type::int(),
                'rules' => ['required', 'exists:'.User::getTableName().',id']
            ],
            'company_id' => [
                'name'  => 'company_id',
                'type'  => Type::int(),
                'rules' => ['exists:'.Company::getTableName().',id']
            ],
            'name' => [
                'name'  => 'name',
                'type'  => Type::string()
            ],
            'email' => [
                'name'  => 'email',
                'type'  => Type::string(),
                'rules' => ['sometimes', 'required', 'max:250', 'email', 'unique:'.User::getTableName()]
            ],
            'password' => [
                'name'  => 'password',
                'type'  => Type::string(),
                'rules' => ['sometimes', 'required', 'required', 'max:250']
            ],
        ];
    }

    public function rules(array $args = []) {
        return [
            'name' => [
                'sometimes',
                'required',
                new UserNameUniqueRule($args),
            ]
        ];
    }
}