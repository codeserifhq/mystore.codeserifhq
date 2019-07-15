<?php

namespace App\Models;

use App\Models\BaseModel;

class CompanyContract extends BaseModel
{
    //

    public function company() {
        return $this->belongsTo('App\Models\Company');
    }
}
