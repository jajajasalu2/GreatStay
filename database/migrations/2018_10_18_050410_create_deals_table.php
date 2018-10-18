<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->increments('d_id');
            $table->integer('a_id');
            $table->integer('o_id');
            $table->integer('c_id');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('duration');
            $table->foreign('o_id')->references('id')->on('users');
            $table->foreign('c_id')->references('id')->on('users');
            $table->foreign('a_id')->references('id')->on('apartment');
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
        Schema::dropIfExists('deals');
    }
}
