<?php 

namespace App\Mutators;

use App\Mutators\BaseMutator;
use App\Contracts\Mutators\UserMutatorInterface;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

use App\Traits\UserInsertAuditTrait;

class UserMutator extends BaseMutator implements UserMutatorInterface {
    use UserInsertAuditTrait;

    public function __construct(User $user){
        $this->model = $user;
    }

    protected function adjustModelBeforeInsert($model, $args=[]) : Model{
        $user = auth()->guard('api')->user();

        $model->password = bcrypt($args['password']);
        if ($user && $user->company_id) {
            $model->company_id = $user->company_id;
        }
        
        return $model;
    }

    protected function beforeUpdateModelAdjustment($model, $args) {
        $user = auth()->guard('api')->user();

        if(isset($args['password'])) {
            $model->password = bcrypt($args['password']);
        }
        
        $userBeingUpdated = User::find($args['id']);
        if (!$user->superadmin && isset($args['company_id'])) {
            $model->company_id = $userBeingUpdated->company_id;  //this reverts company_id if a normal user tries to change these user's company_id
        }
        
        return $model;
    }
}