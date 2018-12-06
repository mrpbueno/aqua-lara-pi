<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGpioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gpio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pin')->unique('pin');
            $table->integer('gpio')->nullable();
            $table->string('type')->nullable();
            $table->string('function')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gpio');
    }
}
