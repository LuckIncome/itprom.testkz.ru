<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id')->default(0)->nullable();
            $table->foreign('market_id')->references('id')->on('market');
            $table->string('analytic')->nullable();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->longText('content')->nullable();
            $table->string('slug')->unique();
            $table->integer('sort_id')->default(0);
            $table->boolean('status')->default(true);
            $table->string('seo_title')->nullable(); 
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
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
        Schema::dropIfExists('news');
    }
}
