<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentOffCampusBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_off_campus_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unique()->unsigned();
            $table->integer('off_campus_room_id')->unsigned();
            $table->datetime('expiring_at');
            $table->timestamps();
        });

        Schema::table('student_off_campus_bookings', function (Blueprint $table) {
            $table->foreign('student_id')
                ->references('id')
                ->on('students');

            $table->foreign('off_campus_room_id')
                ->references('id')
                ->on('off_campus_rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_off_campus_bookings');
    }
}
