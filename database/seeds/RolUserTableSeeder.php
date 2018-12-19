<?php

use Illuminate\Database\Seeder;
use elbauldelcodigo\RolUser;

class RolUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Usuario administrador de el bauldelcodigo
         * puede publicar post, blog, cursos y videos
         */
        $role = new RolUser();
        $role->rol_nombre = "AdminPost";
        $role->rol_descrip = "Rol Usuario que permite manipular los post publicados en el bauldelcodigo";
        $role->save();
        

        /**
         * Usuario de elbauldelcodigo
         * puede crear preguntas, responder, mirar su contribucción en elbauldelcodigo
         * los puntos obtenidos, los comentarios hechos en los posts y foros
         */
        $role = new RolUser();
        $role->rol_nombre = "User";
        $role->rol_descrip = "Rol Usuario que permite manipular su interacción en el bauldelcodigo";
        $role->save();
    }
}
