<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCustomProperty extends Model
{
    public function product() {
        return $this->belongsTo('App\Models\Product');
    }
}
