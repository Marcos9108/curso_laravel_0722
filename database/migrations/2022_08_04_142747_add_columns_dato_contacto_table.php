<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsDatoContactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('datoContacto', function (Blueprint $table) {
            $table->string('nombre', 50)->after('id');
            $table->string('email', 30)->after('nombre');
            $table->integer('telefono')->after('email');
            $table->string('direccion')->after('telefono');
            $table->string('estado')->after('direccion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('datoContacto', function (Blueprint $table) {
            $table->dropColumn('nombre');
            $table->dropColumn('email');
            $table->dropColumn('telefono');
            $table->dropColumn('direccion');
            $table->dropColumn('estado');
        });
    }
}
