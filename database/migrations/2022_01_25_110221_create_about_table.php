<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('bg_image')->nullable();
            $table->string('title')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('first_content')->nullable();
            $table->string('first_image')->nullable();
            $table->string('first_alt_image')->nullable();
            $table->string('first_title_image')->nullable();
            $table->string('second_image')->nullable();
            $table->string('second_alt_image')->nullable();
            $table->string('second_title_image')->nullable();
            $table->longText('second_content')->nullable();
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
        Schema::dropIfExists('about');
    }
}
