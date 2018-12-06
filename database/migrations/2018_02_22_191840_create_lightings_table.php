<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLightingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lightings', function (Blueprint $table) {
            $table->increments('id');
            $table->time('sunrise_start');
            $table->time('sunrise_stop');
            $table->time('sunset_start');
            $table->time('sunset_stop');
            $table->integer('gpio');
            $table->decimal('power', 3,2);
            $table->decimal('max', 3,2);
            $table->decimal('offset', 3,2)->unsigned();
            $table->integer('active');
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
        Schema::dropIfExists('iluminacao');
    }
}
