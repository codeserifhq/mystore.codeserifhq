<?php

namespace App\Models;

use App\Models\BaseModel;

class StockOutboundProduct extends BaseModel
{
    public function product() {
        return $this->belongsTo('App\Models\Product');
    }

    public function stockOutbound() {
        return $this->belongsTo('App\Models\StockOutbound');
    }
}
