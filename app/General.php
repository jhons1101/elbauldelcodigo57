<?php

namespace elbauldelcodigo;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    /*
    
    */
    public function comboModel ($query, $key, $value) {
        foreach ($query as $item) {
            echo $item->key;
            echo $item->value;
        }
    }
}
