<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('poll_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('poll_id')->references('id')->on('polls')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->text('description');
            $table->text('youtube_url');
            $table->string('youtube_title')->nullable();
            $table->text('youtube_description')->nullable();
            $table->string('youtube_tags')->nullable();
            $table->string('youtube_file_name')->nullable();
            $table->string('youtube_video_id')->nullable();
            $table->string('youtube_likes_count')->nullable();
            $table->string('youtube_dislike_counts')->nullable();
            $table->string('youtube_favorite_count')->nullable();
            $table->string('youtube_comment_count')->nullable();
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
        Schema::dropIfExists('videos');
    }
}
