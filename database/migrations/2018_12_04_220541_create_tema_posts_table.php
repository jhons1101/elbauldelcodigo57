<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemaPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tema_posts', function (Blueprint $table) {
            $table->increments('tema_id')->comment('Llave primaria que identifica el identificador del post');
            $table->string('tema_txt', 100)->comment('Descripción del tema');
            $table->string('tema_img', 50)->comment('Imagen/font que representa al tema');
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
        Schema::dropIfExists('tema_posts');
    }
}
