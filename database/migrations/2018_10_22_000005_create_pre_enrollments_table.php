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
            $table->string('paymentType');
            $table->string('status',20)->default("Weiting Payment");
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
