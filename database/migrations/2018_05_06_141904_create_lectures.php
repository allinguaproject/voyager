<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('lectureID');
            $table->bigInteger('countPhraseParts');
            $table->bigInteger('countInputParts');
            $table->string('PhrasePart1');
            $table->string('PhrasePart2');
            $table->string('PhrasePart3');
            $table->string('PhrasePart4');
            $table->string('SolutionPart1');
            $table->string('SolutionPart2');
            $table->string('SolutionPart3');
            $table->string('SolutionPart4');
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
        //
    }
}
