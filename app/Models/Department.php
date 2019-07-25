<?php

namespace App\Models;

use App\Models\SystemCode;

use App\Enums\SystemCodeTypeEnum;

class Department extends SystemCode
{
    

    public function getType() {
        return SystemCodeTypeEnum::DEPARTMENT;
    }

    public function partners() {
        return $this->hasMany('App\Models\Partner', 'department_id');
    }

}
