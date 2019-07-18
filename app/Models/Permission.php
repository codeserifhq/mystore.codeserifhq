<?php

namespace App\Models;

use App\Models\BaseModel;

class Permission extends BaseModel
{
    public function users() {
        return $this->belongsToMany('App\Models\User', 'user_permissions', 'permission_id', 'user_id');
    }

    public function permissionModule() {
        return $this->hasMany('App\Models\PermissionModule');
    }
}
