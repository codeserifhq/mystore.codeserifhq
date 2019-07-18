<?php

namespace App\Models;

use App\Models\BaseModel;

class Sale extends BaseModel
{
    public function stockOutbound() {
        return $this->hasOne('App\Models\StockOutbound', 'sale_id');
    }
    public function seller() {
        return $this->belongsTo('App\Models\Partner', 'sold_by');
    }
}
