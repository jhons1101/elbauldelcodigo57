<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_posts', function (Blueprint $table) {
            $table->increments('tipo_id')->comment('Llave primaria que identifica el tipo de post publicado');
            $table->string('tipo_txt', 100)->comment('Descripción del tipo de post');
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
        Schema::dropIfExists('tipo_posts');
    }
}
