<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'user_types',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            }
        );

        Schema::table(
            'users', 
            function (Blueprint $table) {
                $table->foreign('user_type_id')
                    ->references('id')
                    ->on('user_types');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('user_types');
        Schema::enableForeignKeyConstraints();
    }
}
