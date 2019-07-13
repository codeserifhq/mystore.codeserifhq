<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\SystemCode;

use App\Enums\SystemCodeTypeEnum;

class JobPosition extends BaseModel
{
    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where('type', '=', SystemCodeTypeEnum::JOB_POSITION);
    }

    public function getType() {
        return SystemCodeTypeEnum::JOB_POSITION;
    }

    public function partners() {
        return $this->hasMany('App\Models\JobPosition', 'job_position');
    }
}
