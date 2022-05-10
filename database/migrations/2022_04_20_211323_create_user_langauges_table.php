<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLangaugesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_langauges', function (Blueprint $table) {
            $table->integer('user_id')-> unsigned();
            $table->integer('langauge_id')-> unsigned();
            $table->unique(['user_id', 'langauge_id']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('langauge_id')->references('id')->on('langauges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_langauges');
    }
}
