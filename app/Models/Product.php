<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\StockInboundProduct;
use App\Models\StockOutboundProduct;

class Product extends BaseModel
{
    public function company() {
        return $this->belongsTo('App\Models\Company');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function customProperties() {
        return $this->hasMany('App\Models\ProductCustomProperty');
    }

    public function stockInbounds() {
        return $this->belongsToMany('App\Models\StockInbound', StockInboundProduct::getTableName(), 'product_id', 'stock_inbound_id');
    }

    public function stockOutbounds() {
        return $this->belongsToMany('App\Models\StockOutbound', StockOutboundProduct::getTableName(), 'product_id', 'stock_outbound_id');
    }
}
