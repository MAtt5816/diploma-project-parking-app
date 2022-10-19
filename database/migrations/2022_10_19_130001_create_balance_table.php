<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e-portmonetka', function (Blueprint $table) {
            $table->id();
            $table->float('saldo');
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
        Schema::dropIfExists('e-portmonetka');
    }
}
