<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControllerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontroler', function (Blueprint $table) {
            $table->id();
            $table->string('login', 25);
            $table->string('haslo', 256);
            $table->string('kod_operatora', 5);
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
        Schema::dropIfExists('kontroler');
    }
}
