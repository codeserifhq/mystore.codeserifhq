<?php

namespace App\Models;

use App\Models\BaseModel;

class Address extends BaseModel
{
    public function partner() {
        return $this->belongsTo('App\Models\Partner');
    }
}
