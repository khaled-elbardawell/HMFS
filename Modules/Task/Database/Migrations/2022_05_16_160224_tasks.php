<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();

            $table->unsignedBigInteger('user_from')->nullable();
            $table->foreign('user_from')
              ->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('user_to')->nullable();
            $table->foreign('user_to')
              ->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('board_card_id')->nullable();
            $table->foreign('board_card_id')
                ->references('id')->on('board_cards')->onDelete('cascade');

            $table->string('status')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
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
        // Schema::dropIfExists('tasks');
    }
}
