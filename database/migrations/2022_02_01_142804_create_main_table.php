<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main', function (Blueprint $table) {
            $table->id();
            $table->string('bg_image')->nullable();
            $table->string('title')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('first_image')->nullable();
            $table->string('first_title')->nullable();
            $table->text('first_excerpt')->nullable();
            $table->string('second_image')->nullable();
            $table->string('second_title')->nullable();
            $table->text('second_excerpt')->nullable();
            $table->string('third_image')->nullable();
            $table->string('third_title')->nullable();
            $table->text('third_excerpt')->nullable();
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
        Schema::dropIfExists('main');
    }
}
