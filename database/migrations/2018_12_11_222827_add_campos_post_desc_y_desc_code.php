<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCamposPostDescYDescCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Posts', function (Blueprint $table) {
            $table->string('desc_post', 4000)->comment('campo para guardar el contenido del post');
            $table->string('des_code', 4000)->comment('campo para guardar el código fuente del post');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Posts', function (Blueprint $table) {
            $table->dropColumn('desc_post');
            $table->dropColumn('des_code');
        });
    }
}
