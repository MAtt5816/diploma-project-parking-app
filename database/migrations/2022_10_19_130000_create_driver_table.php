<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kierowca', function (Blueprint $table) {
            $table->id();
            $table->string('imie', 20);
            $table->string('naziwsko', 25);
            $table->string('miejscowosc', 30);
            $table->string('ulica', 25);
            $table->integer('nr_domu');
            $table->string('kod_pocztowy', 6);
            $table->string('nr_tel', 9);
            $table->string('email', 30);
            $table->string('login', 15);
            $table->string('haslo', 256);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kierowca');
    }
}
