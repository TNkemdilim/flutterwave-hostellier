<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentOnCampusBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'student_on_campus_bookings', 
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('student_id')->unsigned();
                $table->integer('on_campus_room_id')->unsigned();
                $table->string('transaction_reference');
                $table->datetime('expiring_at');
                $table->timestamps();
            }
        );

        Schema::table(
            'student_on_campus_bookings',
            function (Blueprint $table) {
                $table->foreign('student_id')
                    ->references('id')
                    ->on('students');

                $table->foreign('on_campus_room_id')
                    ->references('id')
                    ->on('on_campus_rooms');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_on_campus_bookings');
    }
}
