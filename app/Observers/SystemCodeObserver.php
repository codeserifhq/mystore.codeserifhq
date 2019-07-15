<?php

namespace App\Observers;

class SystemCodeObserver
{
    public function creating($model)
    {
        $model->type = $model->getType();
    }
}
