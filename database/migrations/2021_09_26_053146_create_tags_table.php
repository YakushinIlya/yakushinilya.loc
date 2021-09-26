<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('tags_head')->nullable();
            $table->string('tags_url_address')->nullable();
            $table->string('tags_url_prefix')->nullable();
            $table->string('tags_article')->nullable();
            $table->integer('tags_status')->nullable();
            $table->integer('tags_title')->nullable();
            $table->integer('tags_description')->nullable();
            $table->integer('tags_keywords')->nullable();
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('tags');
    }
}
