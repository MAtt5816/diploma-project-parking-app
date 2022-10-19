<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pojazd', function (Blueprint $table) {
            $table->id();
            $table->string('nr_rejestracyjny', 8);
            $table->string('marka', 20);
            $table->string('model', 20);
            $table->unsignedBigInteger('kierowca_id');

            $table->foreign('kierowca_id')->references('id')->on('kierowca');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pojazd');
    }
}
