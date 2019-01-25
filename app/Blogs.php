<?php

namespace elbauldelcodigo;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    /**
     * Permite buscar cualquier coincidencia del título del blog en la DB
     * @param string $query   -> consulta de la base de datos
     * @param string $titBlog -> título del blog
     * @author: Jhons_1101@hotmail.com
     */
    public function scopeBuscarEnBlog($query, $titBlog) {
        if (trim($titBlog) != "") {
            $query->where('title', 'LIKE', '%' . $titBlog . '%');
        }
    }
}
