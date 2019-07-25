<?php

namespace App\Models;

use App\Enums\SystemCodeTypeEnum;

class JobPosition extends SystemCode
{

    public function getType() {
        return SystemCodeTypeEnum::JOB_POSITION;
    }

    public function partners() {
        return $this->hasMany('App\Models\JobPosition', 'job_position');
    }
}
