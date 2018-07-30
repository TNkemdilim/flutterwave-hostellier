<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnCampusRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('on_campus_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('hall_name');
            $table->string('hall_location');
            $table->mediumText('description');
            $table->float('price')->default(0.0);
            $table->integer('students_per_room')->default(4);
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
        Schema::dropIfExists('on_campus_rooms');
    }
}
