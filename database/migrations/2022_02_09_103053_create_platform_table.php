<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform', function (Blueprint $table) {
            $table->id();
            $table->string('bg_image')->nullable();
            $table->string('bg_title')->nullable();
            $table->text('bg_excerpt')->nullable();
            $table->string('first_image')->nullable();
            $table->string('first_title')->nullable();
            $table->text('first_excerpt')->nullable();
            $table->string('second_image')->nullable();
            $table->string('second_title')->nullable();
            $table->text('second_excerpt')->nullable();
            $table->string('logo_image')->nullable();
            $table->text('logo_excerpt')->nullable();
            $table->string('platform_image')->nullable();
            $table->text('platform_excerpt')->nullable();
            $table->string('platform_title')->nullable();
            $table->string('first_processes_title')->nullable();
            $table->string('first_processes_image')->nullable();
            $table->longText('first_processes_content')->nullable();
            $table->string('second_processes_title')->nullable();
            $table->string('second_processes_image')->nullable();
            $table->longText('second_processes_content')->nullable();
            $table->string('third_processes_title')->nullable();
            $table->string('third_processes_image')->nullable();
            $table->longText('third_processes_content')->nullable();
            $table->string('fourth_processes_title')->nullable();
            $table->string('fourth_processes_image')->nullable();
            $table->longText('fourth_processes_content')->nullable();
            $table->string('second_platform_image')->nullable();
            $table->longText('first_lower_content')->nullable();
            $table->string('first_icon_image')->nullable();
            $table->string('first_icon_title')->nullable();
            $table->text('first_icon_excerpt')->nullable();
            $table->string('second_icon_image')->nullable();
            $table->string('second_icon_title')->nullable();
            $table->text('second_icon_excerpt')->nullable();
            $table->string('third_icon_image')->nullable();
            $table->string('third_icon_title')->nullable();
            $table->text('third_icon_excerpt')->nullable();
            $table->string('fourth_icon_image')->nullable();
            $table->string('fourth_icon_title')->nullable();
            $table->text('fourth_icon_excerpt')->nullable();
            $table->string('icon_title')->nullable();
            $table->longText('second_lower_content')->nullable();
            $table->string('first_task_title')->nullable();
            $table->string('task_image')->nullable();
            $table->string('second_task_title')->nullable();
            $table->longText('first_task_content')->nullable();
            $table->longText('second_task_content')->nullable();
            $table->longText('third_task_content')->nullable();
            $table->longText('third_lower_content')->nullable();
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
        Schema::dropIfExists('platform');
    }
}
