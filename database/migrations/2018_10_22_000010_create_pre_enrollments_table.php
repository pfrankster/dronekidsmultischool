<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_enrollments', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->string('guardianName');
            $table->string('guardianCPF',18);
            $table->string('guardianPhone',19);
            $table->string('guardianRelation',14);
            $table->string('address',100);
            $table->string('state',100);
            $table->string('city',100);
            $table->string('email');
            $table->string('studentName');
            $table->string('studentGender',6);
            $table->unsignedInteger('sectionId');
            $table->unsignedInteger('paymentTypeId');
            $table->unsignedInteger('statusId')->default(1);
            //$table->foreign('sectionId')->references('id')->on('turmas')->onDelete('cascade');;
            $table->foreign('paymentTypeId')->references('id')->on('paymant_types')->onDelete('cascade');;
            $table->foreign('statusId')->references('id')->on('pe_status')->onDelete('cascade');;
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_enrollments');
    }
}
