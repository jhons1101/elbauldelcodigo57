<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->comment('Título del blog');
            $table->longText('text')->comment('Texto del blog');
            $table->integer('id_usu')->comment('Usuario que escribió el post');
            $table->string('slug', 200)->comment('Url que identifica al blog');
            $table->string('tags_blog', 50)->comment('Tags asociados al blog');
            $table->string('image', 300)->comment('Imagen principal asociado en relación 16*9');
            $table->string('preview', 50)->comment('Texto recortado para previsualizar, se guarda sin estilo css.');
            $table->integer('views', 20)->comment('Cantidad de vistas del blog, por cada refresh de la página');
            $table->boolean('flg_publicar')->comment('Flag para publicar. 1 para publicado, 0 para no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog');
    }
}
