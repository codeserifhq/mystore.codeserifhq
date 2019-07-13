<?php

namespace App\Models;

use App\Models\BaseModel;

class Role extends BaseModel
{
    public function company() {
        return $this->belongsTo('App\Models\Role');
    }

    public function permissions() {
        return $this->belongsToMany('App\model\Permission', 'role_permissions', 'role_id', 'permission_id');
    }
}
