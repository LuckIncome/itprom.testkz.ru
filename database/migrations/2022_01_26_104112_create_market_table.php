<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market', function (Blueprint $table) {
            $table->id();
            $table->string('bg_image')->nullable();
            $table->string('title')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('first_content')->nullable();
            $table->longText('second_content')->nullable();
            $table->longText('third_content')->nullable();
            $table->string('slug')->unique();
            $table->boolean('status')->default(0);
            $table->integer('sort_id')->default(0);
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
        Schema::dropIfExists('market');
    }
}
