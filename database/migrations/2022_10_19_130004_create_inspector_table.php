<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspectors', function (Blueprint $table) {
            $table->id();
            $table->string('login', 25);
            $table->string('password', 256);
            $table->string('operator_code', 5);
            $table->unsignedBigInteger('operator_id');
            $table->timestamps();

            $table->foreign('operator_id')->references('id')->on('operators');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspectors');
    }
}
