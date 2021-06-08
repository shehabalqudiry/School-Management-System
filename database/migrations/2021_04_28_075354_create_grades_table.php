<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    // Create Table
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('notes');
            $table->timestamps();
        });
    }

    // Drop This Table
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
