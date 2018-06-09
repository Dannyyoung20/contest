<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('poll_id');
            $table->unsignedInteger('video_id');
            $table->unsignedInteger('subscription_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('poll_id')->references('id')->on('polls')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade')->onUpdate('cascade');
            $table->string('vote_count');
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
        Schema::dropIfExists('votes');
    }
}
