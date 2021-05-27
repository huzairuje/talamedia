<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePodcastEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcast_episodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('podcast_id');
            $table->string('listen_note_episode_id', 191)->nullable();
            $table->string('title',255)->nullable();
            $table->text('description')->nullable();
            $table->string('listen_note_audio_url',255)->nullable();
            $table->integer('audio_length_in_second')->nullable();
            $table->string('image_url_listen_note',255)->nullable();
            $table->string('thumbnail_url_listen_note',255)->nullable();
            $table->boolean('explicit_content')->default(0);
            $table->boolean('is_published')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('podcast_episodes');
    }
}
