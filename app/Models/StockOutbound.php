<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\StockOutboundProduct;

class StockOutbound extends BaseModel
{
    public function products() {
        return $this->belongsToMany('App\Models\Product', StockOutboundProduct::getTableName(), 'stock_outbound_id', 'product_id');
    }

    public function sale() {
        return $this->belongsTo('App\Models\Sale');
    }

    public function stockOutboundBy() {
        return $this->hasMany('App\Models\Partner', 'stock_out_by');
    }
}
