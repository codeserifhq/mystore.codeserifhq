<?php

namespace App\Models;

use App\Models\BaseModel;

class Partner extends BaseModel
{
    //
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function department() {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function job() {
        return $this->belongsTo('App\Models\JobPosition', 'job_position');
    }

    public function manager() {
        return $this->belongsTo('App\Models\Partner', 'manager_id');
    }

    public function staff() {
        return $this->hasMany('App\Models\Partner', 'manager_id');
    }

    public function contacts() {
        return $this->hasMany('App\Models\Contact');
    }

    public function addresses() {
        return $this->hasMany('App\Models\Address');
    }

    public function suppliedInbounds() {
        return $this->hasMany('App\Models\StockInbound', 'supplier_id');
    }

    public function stockInbounds() {
        return $this->hasMany('App\Models\StockInbound', 'stock_in_by');
    }

    public function stockOutbounds() {
        return $this->hasMany('App\Models\StockOutbound', 'stock_out_by');
    }
}
