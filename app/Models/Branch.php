<?php

namespace App\Models;

use App\Models\BaseModel;

class Branch extends BaseModel
{
    public function company() {
        return $this->belongsTo('App\Models\Company');
    }

    public function stockInbounds() {
        return $this->hasMany('App\Models\StockInbound', 'stock_in_branch_id');
    }

    public function stockOutbounds() {
        return $this->hasMany('App\Models\StockOutbound', 'branch_id');
    }
}
