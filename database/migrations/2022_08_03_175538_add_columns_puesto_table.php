<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsPuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('puesto', function (Blueprint $table) {
            $table->string('nombre', 50)->after('id');
            $table->string('requisitos', 30)->after('nombre');
            $table->tinyInteger('rango_salario')->after('requisitos');
            $table->string('puestos_disponibles', 50)->after('rango_salario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('puesto', function (Blueprint $table) {
            $table->dropColumn('nombre');
            $table->dropColumn('requisitos');
            $table->dropColumn('rango_salario');
            $table->dropColumn('puestos_disponibles');
        });
    }
}
