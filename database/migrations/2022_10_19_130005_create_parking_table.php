<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking', function (Blueprint $table) {
            $table->id();
            $table->float('cena');
            $table->string('lokalizacja', 20);
            $table->string('godziny_otwarcia', 6);
            $table->string('dodatk_uslugi', 40);
            $table->string('udogodnienia', 40);
            $table->unsignedBigInteger('operator_id');

            $table->foreign('operator_id')->references('id')->on('operator');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parking');
    }
}
