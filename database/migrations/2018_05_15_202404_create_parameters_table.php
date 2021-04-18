<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->decimal('temperature', 4, 1)->nullable($value = true);
            $table->decimal('ph', 4, 1)->nullable($value = true);
            $table->decimal('nh4', 4, 1)->nullable($value = true);
            $table->decimal('no2', 4, 1)->nullable($value = true);
            $table->decimal('no3', 4, 1)->nullable($value = true);
            $table->decimal('po4', 4, 1)->nullable($value = true);
            $table->decimal('cl', 4, 1)->nullable($value = true);
            $table->decimal('kh', 4, 1)->nullable($value = true);
            $table->decimal('gh', 4, 1)->nullable($value = true);
            $table->decimal('co2', 4, 1)->nullable($value = true);
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
        Schema::dropIfExists('parameters');
    }
}
