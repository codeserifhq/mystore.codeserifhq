<?php 

namespace App\Mutators;

use App\Contracts\Mutators\BaseMutatorInterface;
use Illuminate\Database\Eloquent\Model;

class BaseMutator implements BaseMutatorInterface{

    protected $model;
    protected $primarykey = 'id';
    protected $args;

    public function insertModel($args) {
        $this->args = $args;

        foreach($args as $key => $value) {
            $this->model->{$key} = $value;
        }

        $this->model = $this->userInsertAudit($this->model);
        $this->model = $this->adjustModelBeforeInsert($this->model, $args);

        $this->model->save();
        return $this->model;
    }

    protected function userInsertAudit(Model $model) : Model  {
        return $model;
    }

    protected function adjustModelBeforeInsert(Model $model, $args = []) : Model {
        return $model;
    }

    public function updateModel($args) {
        $this->args = $args;

        $model = $this->model->find($args[$this->primarykey]);

        //TODO: validate for unique if update
        foreach($args as $key => $value) {
            $model->{$key} = $value;
        }

        $model = $this->userUpdateAudit($model);

        $model->save();

        return $model;
    }

    protected function userUpdateAudit($model) {
        return $model;
    }

    public function deleteRecord($args) {
        if (isset($args[$this->primarykey])) {
            $model = $this->model->find($args[$this->primarykey]);
            
            if ($this->checkIfDeletable($model)) {
                $temp = $model;
                $model->forceDelete();
                return $temp;
            } else {
                return false;
            }
        }
        
        return false;
    }

    protected function checkIfDeletable($model) {
        foreach($model->childRelationships as $value) {
            if ($model->{$value}()->count() > 0) {
                return false;
            }
        }
        return true;
    }

}