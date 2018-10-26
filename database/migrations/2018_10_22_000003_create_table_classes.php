<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClasses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::connection('droneKids')->ccreate('cursos', function (Blueprint $table) {
        //     $table->increments('id')->autoIncrement();
        //     $table->string('nome');
        //     $table->unsignedInteger('escolaid');
        //     $table->foreign('escolaid')->references('id')->on('escolas')->onDelete('cascade');;
        //     // $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::connection('droneKids')->dropIfExists('cursos');
    }
}
