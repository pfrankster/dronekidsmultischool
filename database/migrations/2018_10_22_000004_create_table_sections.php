<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::connection('droneKids')->create('turmas', function (Blueprint $table) {
        //     $table->increments('id')->autoIncrement();
        //     $table->string('deschorario');
        //     $table->unsignedInteger('idescola');
        //     $table->unsignedInteger('idcurso');
        //     // $table->timestamps();
        //     //config
        //     $table->foreign('idescola')->references('id')->on('escolas')->onDelete('cascade');;
        //     $table->foreign('idcurso')->references('id')->on('cursos')->onDelete('cascade');;
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::connection('droneKids')->dropIfExists('turmas');
    }
}
