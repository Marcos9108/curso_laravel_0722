<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleado', function (Blueprint $table) {
            $table->string('nombre', 50)->after('id');
            $table->string('puesto', 30)->after('nombre');
            $table->tinyInteger('edad')->after('puesto');
            $table->integer('salario')->after('edad');
            $table->boolean('activo')->after('salario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleado', function (Blueprint $table) {
            $table->dropColumn('nombre');
            $table->dropColumn('puesto');
            $table->dropColumn('edad');
            $table->dropColumn('salario');
            $table->dropColumn('activo');
        });
    }
}
