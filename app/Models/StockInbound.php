<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\StockInboundProduct;

class StockInbound extends BaseModel
{
    public function branch() {
        return $this->belongsTo('App\Models\Branch', 'stock_in_branch_id');
    }

    public function supplier() {
        return $this->belongsTo('App\Models\Partner', 'supplier_id');
    }

    public function stockInboundBy() {
        return $this->belongsTo('App\Models\Partner', 'stock_in_by');
    }

    public function products() {
        return $this->belongsToMany('App\Models\Product', StockInboundProduct::getTableName(), 'stock_inbound_id', 'product_id');
    }

    public function stockOutbound() {
        return $this->belongsTo('App\Models\StockOutbound', 'stock_outbound_id');
    }
}
