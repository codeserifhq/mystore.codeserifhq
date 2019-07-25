<?php

namespace App\Models;

use App\Models\SystemCode;

use App\Enums\SystemCodeTypeEnum;

class Role extends SystemCode
{
    public function getType() {
        return SystemCodeTypeEnum::DEPARTMENT;
    }
    
    public function company() {
        return $this->belongsTo('App\Models\Role');
    }

    public function permissions() {
        return $this->belongsToMany('App\model\Permission', 'role_permissions', 'role_id', 'permission_id');
    }
}
