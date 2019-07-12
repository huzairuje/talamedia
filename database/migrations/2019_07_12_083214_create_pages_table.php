<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 191);
            $table->string('page_slug', 191)->unique();
            $table->text('description', 65535)->nullable();
            $table->string('cannonical_link', 191)->nullable();
            $table->string('seo_title', 191)->nullable();
            $table->string('seo_keyword', 191)->nullable();
            $table->text('seo_description', 65535)->nullable();
            $table->string('instagram_access_token_1', 255)->nullable();
            $table->string('instagram_access_token_2', 255)->nullable();
            $table->string('instagram_access_token_3', 255)->nullable();
            $table->boolean('status')->default(1);
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
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
        Schema::dropIfExists('pages');
    }
}
