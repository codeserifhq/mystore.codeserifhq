<?php 

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait UserInsertAuditTrait {
    protected function userInsertAudit(Model $model) : Model{
        
        if (auth()->guard('api')->user()) { 
            $model->created_by = auth()->guard('api')->user()->id;
        }

        return $model; 
    }
}