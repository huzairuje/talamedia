<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcasts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('listen_note_podcast_id',255)->nullable();
            $table->string('title',255)->nullable();
            $table->string('publisher',255)->nullable();
            $table->string('image_url_listen_note',255)->nullable();
            $table->string('thumbnail_url_listen_note',255)->nullable();
            $table->text('description')->nullable();
            $table->string('country', 191)->nullable();
            $table->string('language',191)->nullable();
            $table->string('rss_url_from_listen_note',191)->nullable();
            $table->string('listen_note_url',191)->nullable();
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
        Schema::dropIfExists('podcasts');
    }
}
