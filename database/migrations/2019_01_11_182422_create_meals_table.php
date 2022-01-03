<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id');

            // $table->unsignedInteger('type_id');

            $table->date('date');
            $table->time('time');

            $table->string('user_type', 32);
            $table->unsignedInteger('user_type_id');

            $table->string('dish_type', 1);
            $table->unsignedSmallInteger('dish_id');

            $table->unsignedSmallInteger('quantity')->nullable();

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
        Schema::dropIfExists('meals');
    }
}
