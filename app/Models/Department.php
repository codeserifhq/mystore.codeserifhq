<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\SystemCode;

use App\Enums\SystemCodeTypeEnum;

class Department extends BaseModel
{
    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where('type', '=', SystemCodeTypeEnum::DEPARTMENT);
    }

    public function getType() {
        return SystemCodeTypeEnum::DEPARTMENT;
    }

    public function partners() {
        return $this->hasMany('App\Models\Partner', 'department_id');
    }

}
