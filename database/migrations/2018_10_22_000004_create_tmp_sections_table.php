<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTmpSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmp_sections', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->string('name');
            $table->unsignedInteger('schoolId');
            $table->unsignedInteger('classId');
            // $table->timestamps();
            //config
            $table->foreign('schoolId')->references('id')->on('tmp_schools')->onDelete('cascade');;
            $table->foreign('classId')->references('id')->on('tmp_classes')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tmp_sections');
    }
}
