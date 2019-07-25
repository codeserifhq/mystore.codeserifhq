<?php

namespace App\Observers;

use Request;
use DB;

use App\Models\UserActivity;

class ActivityObserver
{
    private function getArrayStructure($model, $activity) {
        return [
            'user_id'    => auth()->guard('api')->user() ? auth()->guard('api')->user()->id : null,
            'email'      => auth()->guard('api')->user() ? auth()->guard('api')->user()->email : null,
            'table'      => $model->getTable(),
            'activity'   => $model->{$activity}(),
            'ip_address' => Request::ip(),
            'created_at' => now(),
            'updated_at'  => now()
        ];
    }

    public function created($model)
    {
        DB::table(UserActivity::getTableName())->insert($this->getArrayStructure($model, 'createActivity'));   
    }

    public function updated($model)
    {
        DB::table(UserActivity::getTableName())->insert($this->getArrayStructure($model, 'updateActivity'));
    }

    public function deleted($model)
    {
        DB::table(UserActivity::getTableName())->insert($this->getArrayStructure($model, 'deleteActivity'));
    }
}
