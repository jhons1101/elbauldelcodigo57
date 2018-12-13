<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PerformanceTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function(Blueprint $table) {
            $table->dropColumn('post_tipo');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('flg_publicar')->default(1)->change();
            $table->unique('post_tit')->charset('utf8')->change();
            $table->enum('post_tipo', ['TEMA','NOTICIA','ENTRADA'])->comment('tipo de entrada POSTS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
}
