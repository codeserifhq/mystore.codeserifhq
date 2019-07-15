<?php

namespace App\Models;

use App\Models\BaseModel;

class ProductCategory extends BaseModel
{
    public function company() {
        return $this->belongsTo('App\Models\Company');
    }

    public function children() {
        return $this->hasMany('App\Models\ProductCategory', 'parent_id');
    }

    public function parent() {
        return $this->hasMany('App\Models\ProductCategory', 'parent_id');
    }

    public function products() {
        return $this->hasMany('App\Models\Products');
    }
}
