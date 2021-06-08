<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            // From
            $table->unsignedBigInteger('from_grade');
            $table->unsignedBigInteger('from_level');
            $table->unsignedBigInteger('from_section');
            $table->string('academic_year');
            // To
            $table->unsignedBigInteger('to_grade');
            $table->unsignedBigInteger('to_level');
            $table->unsignedBigInteger('to_section');
            $table->string('academic_year_new');

            $table->timestamps();

            // Foreign Keys
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            // From
            $table->foreign('from_grade')->references('id')->on('grades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('from_level')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('from_section')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
            // To
            $table->foreign('to_grade')->references('id')->on('grades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('to_level')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('to_section')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
