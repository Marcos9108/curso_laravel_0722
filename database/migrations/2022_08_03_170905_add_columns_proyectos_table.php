<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->string('nombre', 50)->after('id');
            $table->string('lenguajeProgramacion', 30)->after('nombre');
            $table->string('plataforma')->after('lenguajeProgramacion');
            $table->integer('porcentajeAvance')->after('plataforma');
            $table->string('personalInvolucrado')->after('porcentajeAvance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropColumn('nombre');
            $table->dropColumn('lenguajeProgramacion');
            $table->dropColumn('plataforma');
            $table->dropColumn('porcentajeAvance');
            $table->dropColumn('personalInvolucrado');
        });
    }
}
