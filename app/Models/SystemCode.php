<?php

namespace App\Models;

use App\Models\BaseModel;

use App\Enums\SystemCodeTypeEnum;

class SystemCode extends BaseModel
{
    protected $table='system_codes';
    
    public static function jobs() {
        return self::where('type', SystemCodeTypeEnum::JOB_POSITION);
    }

    public static function departments() {
        return self::where('type', SystemCodeTypeEnum::DEPARTMENT);
    }
}
