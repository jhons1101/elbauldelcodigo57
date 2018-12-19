<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametroGralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametro_grals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('txt_parametro',2000)->nullable();
            $table->integer('num_parametro')->nullable();
            $table->string('desc_parametro',500);
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
        Schema::dropIfExists('parametro_grals');
    }
}
