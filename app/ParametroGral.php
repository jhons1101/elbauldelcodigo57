<?php

namespace elbauldelcodigo;

use Illuminate\Database\Eloquent\Model;

class ParametroGral extends Model
{
    /**
     * Devuelve el valor del parámetro de tipo cadena de la DB
     */
    public function getParametroString ($cod) {
        return ParametroGral::where('id', '=', $cod)->firstOrFail()->txt_parametro;
    }
    
    /**
     * Devuelve el valor del parámetro de tipo numérico de la DB
     */
    public function getParametroNumber ($cod) {
        return ParametroGral::where('id', '=', $cod)->firstOrFail()->num_parametro;
    }
}
