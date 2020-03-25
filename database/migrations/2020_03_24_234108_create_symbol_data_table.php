<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSymbolDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symbol_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('symbol_id')->unsigned();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->integer('white')->nullable();
            $table->integer('grey')->nullable();
            $table->integer('black')->nullable();
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
        Schema::dropIfExists('symbol_data');
    }
}
