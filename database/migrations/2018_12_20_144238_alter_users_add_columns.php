<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('fec_nac')->comment('Fecha de nacimiento del usuario')->nullable();
            $table->integer('prof')->comment('Usuario profesional profesor')->nullable();
            $table->string('img')->comment('nombre de la imagen del usuario en el servidor')->nullable();
            $table->string('desc_user')->comment('Descripción breve del usuario')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('fec_nac');
            $table->dropColumn('prof');
            $table->dropColumn('img');
            $table->dropColumn('desc_user');
        });
    }
}
