<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpis', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('temperature', 4, 1);
            $table->decimal('memory', 4, 1);
            $table->decimal('disk', 4, 1);
            $table->decimal('cpu', 4, 1);
            $table->integer('uptime' );
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
        Schema::dropIfExists('rpis');
    }
}
