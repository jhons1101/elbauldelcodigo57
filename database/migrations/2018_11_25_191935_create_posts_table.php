<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->comment('llave primaria de la tabla POSTS');
            $table->string('post_tit', 50)->comment('titulo de la entrada del POSTS');
            $table->integer('post_tema')->comment('tema principal relacionado a la entrada');
            $table->string('post_tags', 50)->nullable($value = true)->comment('subtemas relacionados a la entrada');
            $table->string('post_usu', 20)->comment('usuario que escribió la entrada');
            $table->date('post_fec')->comment('fecha de publicación de la entrada');
            $table->string('post_key', 500)->comment('palabras claves de lka entrada para el SEO');
            $table->string('post_desc', 300)->comment('breve descripción de la entrada para mostrar en SEO');
            $table->enum('post_tipo', ['TEMA','NOTICIA','ENTRADA'])->comment('tipo de entrada POSTS');
            $table->boolean('flg_publicar')->comment('1 para publicar la entrada y 0 para ocultarla de la pantalla');
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
        Schema::dropIfExists('posts');
    }
}
