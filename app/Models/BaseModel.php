<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public static function getTableName()
    {
        return with(new static)->getTable();
    }

    public function createActivity() {
        return "Created data in ".$this->getTable()." with id of ".$this->id;
    }

    public function updateActivity() {
        return "Updated data in ".$this->getTable()." with id of ".$this->id;
    }

    public function deleteActivity($model) {
        return "Deleted data in ".$this->getTable()." with id of ".$this->id;
    }
}
