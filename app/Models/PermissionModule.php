<?php

namespace App\Models;

use App\Models\BaseModel;

class PermissionModule extends BaseModel
{
    public function permissionSection() {
        return $this->belongsTo('App\Models\PermissionSection');
    }

    public function permissions() {
        return $this->hasMany('App\Models\Permission');
    }
}
