<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_head')->nullable();
            $table->string('category_url_address')->nullable();
            $table->string('category_url_prefix')->nullable();
            $table->string('category_article')->nullable();
            $table->integer('category_parent')->nullable();
            $table->integer('category_status')->nullable();
            $table->string('category_title')->nullable();
            $table->string('category_description')->nullable();
            $table->string('category_keywords')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
