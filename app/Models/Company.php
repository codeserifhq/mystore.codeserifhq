<?php

namespace App\Models;

use App\Models\BaseModel;

class Company extends BaseModel
{
    public function users() {
        return $this->hasMany('App\Models\User');
    }

    public function partners() {
        return $this->hasMany('App\Models\Partner');
    }

    public function roles() {
        return $this->hasMany('App\Models\Role');
    }

    public function categories() {
        return $this->hasMany('App\Models\ProductCategory');
    }

    public function contracts() {
        return $this->hasMany('App\Models\CompanyContract');
    }

    public function products() {
        return $this->hasMany('App\Models\Products');
    }

    public function branches() {
        return $this->hasMany('App\Models\Branch');
    }

    public function stockInbounds() {
        return $this->hasManyThrough('App\Models\StockInbound', 'App\Models\Partner', 'company_id', 'stock_in_by');    
    }

    public function stockOutbounds() {
        return $this->hasManyThrough('App\Models\StockOutbound', 'App\Models\Partner', 'company_id', 'stock_in_by');
    }
}
