<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffCampusRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('off_campus_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->mediumText('description');
            $table->float('price')->default(0.0);
            $table->string('picture');
            $table->boolean('booked')->default(false);
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
        Schema::dropIfExists('off_campus_rooms');
    }
}
