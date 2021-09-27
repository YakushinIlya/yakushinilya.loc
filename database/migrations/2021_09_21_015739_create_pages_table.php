<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('page_head')->nullable();
            $table->string('page_url_address')->nullable();
            $table->string('page_url_prefix')->nullable();
            $table->string('page_article')->nullable();
            $table->string('page_title')->nullable();
            $table->string('page_description')->nullable();
            $table->string('page_keywords')->nullable();
            $table->string('page_template')->nullable();
            $table->integer('page_status')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
