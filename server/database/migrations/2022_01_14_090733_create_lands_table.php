<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->text('city')->nullable();
            $table->text('img')->nullable();    
            $table->integer('size')->nullable();
            $table->text('cadastral_sheet')->nullable();
            $table->text('cadastral_map')->nullable();
            $table->text('cadastral_parcel')->nullable();
            $table->text('ground_type')->nullable();
            $table->text('watering_type')->nullable();
            $table->text('offer_type')->nullable();
            $table->integer('price')->nullable();
            $table->boolean('available')->nullable();
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
        Schema::dropIfExists('lands');
    }
}
