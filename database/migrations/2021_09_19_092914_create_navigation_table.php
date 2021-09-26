<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigation', function (Blueprint $table) {
            $table->id();
            $table->string('head')->nullable();
            $table->string('route')->nullable();
            $table->string('class')->nullable();
            $table->string('icon')->nullable();
            $table->string('target')->nullable();
            $table->string('location')->nullable();
            $table->json('dropdown')->nullable();
            $table->integer('range')->nullable();
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
        Schema::dropIfExists('navigation');
    }
}
