<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMessageThread extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_thread', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_1');
            $table->unsignedBigInteger('user_2');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_1')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_2')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_thread');
    }
}
