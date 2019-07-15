<?php

namespace App\Models;

use App\Models\BaseModel;

class Contact extends BaseModel
{
    public function partner() {
        return $this->belongsTo('App\Models\Partner');
    }
}
