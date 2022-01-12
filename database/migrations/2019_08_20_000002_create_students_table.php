<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained();
            $table->foreignId('teacher_id')->constrained();
            $table->string('studImage')->nullable();
            $table->string('studFullName');
            $table->string('studIdCard');
            $table->string('address');
            $table->string('gender');
            $table->string('age');
            $table->string('brthOfDate');
            $table->string('religon');
            $table->string('parentFullName');
            $table->string('parentIdCard');
            $table->string('parentSalary');
            $table->string('status_attendance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
