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
            $table->text('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('gender_id')->unsigned();
            $table->bigInteger('nationalitie_id')->unsigned();
            $table->bigInteger('blood_id')->unsigned();
            $table->date('date_birth');
            $table->bigInteger('grade_id')->unsigned();
            $table->bigInteger('level_id')->unsigned();
            $table->bigInteger('section_id')->unsigned();
            $table->bigInteger('sparent_id')->unsigned();
            $table->string('academic_year');
            $table->timestamps();
            
            
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('nationalitie_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreign('blood_id')->references('id')->on('bloods')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('sparent_id')->references('id')->on('sparents')->onDelete('cascade');
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
