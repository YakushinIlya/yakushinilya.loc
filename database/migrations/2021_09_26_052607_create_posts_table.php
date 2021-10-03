<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_head')->nullable();
            $table->string('post_url_address')->nullable();
            $table->string('post_url_prefix')->nullable();
            $table->string('post_article')->nullable();
            $table->integer('post_status')->nullable();
            $table->string('post_title')->nullable();
            $table->string('post_description')->nullable();
            $table->string('post_keywords')->nullable();
            $table->string('post_template')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
