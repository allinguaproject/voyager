<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("level");
            $table->string("Thema");
            $table->string("Headers");
            $table->string("Titel");
            $table->bigInteger("TableID");
            $table->bigInteger("LektionID");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extra_informations');
    }
}
