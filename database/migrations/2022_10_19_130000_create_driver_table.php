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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('surname', 25);
            $table->string('city', 30);
            $table->string('street', 25);
            $table->string('house_number', 7);
            $table->string('postal_code', 6);
            $table->string('phone', 9);
            $table->string('email', 30);
            $table->string('login', 15);
            $table->string('password', 256);
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
        Schema::dropIfExists('drivers');
    }
}
