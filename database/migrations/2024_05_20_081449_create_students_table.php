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
            $table->string('matricule')->nullable();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('bac_series')->nullable();
            $table->string('class')->nullable();
            $table->string('group')->nullable();
            $table->string('subgroup')->nullable();
            $table->string('email')->nullable();
            $table->string('cne_number')->nullable();
            $table->string('cin_number')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('nationality')->default('MAROCAINE');
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
