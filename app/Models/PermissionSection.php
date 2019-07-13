<?php

namespace App\Models;

use App\Models\BaseModel;

class PermissionSection extends BaseModel
{
    public function permissionModules() {
        return $this->hasMany('App\Models\PermissionModule');
    }

    public function permissions() {
        return $this->hasManyThrough('App\Models\Permission', 'App\Models\PermissionModule');    
    }
    
}
