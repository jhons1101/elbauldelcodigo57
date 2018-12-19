<?php

namespace elbauldelcodigo;

use Illuminate\Database\Eloquent\Model;

class RolUser extends Model
{

    /**
     * Me establece la relacion de muchos a muchos con la tabla de Users.
     *
     * @var array
     */
    public function Users () {
        return $this->belongsToMany('elbauldelcodigo\User');
    }
}
