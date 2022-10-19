<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postoj', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_rozpoczecia');
            $table->dateTime('data_zakonczenia');
            $table->unsignedBigInteger('kierowca_id');
            $table->unsignedBigInteger('parking_id');

            $table->foreign('kierowca_id')->references('id')->on('kierowca');
            $table->foreign('parking_id')->references('id')->on('parking');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postoj');
    }
}
