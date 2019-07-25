<?php

namespace App\Models;

use App\Models\BaseModel;

use App\Enums\SystemCodeTypeEnum;

class SystemCode extends BaseModel
{
    protected $table='system_codes';
    
    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where('type', '=', $this->getType());
    }

    public static function jobs() {
        return self::where('type', SystemCodeTypeEnum::JOB_POSITION);
    }

    public static function departments() {
        return self::where('type', SystemCodeTypeEnum::DEPARTMENT);
    }

    public static function roles() {
        return self::where('type', SystemCodeTypeEnum::ROLE);
    }
}
