<?php

namespace App\Models;

use App\Models\BaseModel;

class Sale extends BaseModel
{
    public function stockOutbounds() {
        return $this->hasMany('App\Models\StockOutbound', 'sale_id');
    }
}
