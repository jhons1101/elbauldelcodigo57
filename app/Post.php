<?php

namespace elbauldelcodigo;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Permite buscar cualquier coincidencia del título del post en la DB
     * @param string $query   -> consulta de la base de datos
     * @param string $titPost -> título del post
     * @author: Jhons_1101@hotmail.com
     */
    public function scopeBuscarEnPost($query, $titPost) {
        if (trim($titPost) != "") {
            $query->where('post_tit', 'LIKE', '%' . $titPost . '%');
        }
    }
}
