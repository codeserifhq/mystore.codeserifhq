<?php

namespace App\Models;

use App\Models\BaseModel;

class StockInboundProduct extends BaseModel
{
    public function stockInbound() {
        return $this->belongsTo('App\Models\StockInbound');
    }

    public function product() {
        return $this->belongsTo('App\Models\Product');
    }
}
