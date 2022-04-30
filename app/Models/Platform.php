<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Platform extends Model
{
    use HasFactory;
    use Translatable;
    protected $table = 'platform';
    protected $translatable = [
        'bg_title', 
        'bg_excerpt',
        'first_title', 
        'first_excerpt',
        'second_title', 
        'second_excerpt',
        'logo_excerpt', 
        'platform_excerpt',
        'platform_title', 
        'first_processes_title',
        'first_processes_content', 
        'second_processes_title',
        'second_processes_content', 
        'third_processes_title',
        'third_processes_content', 
        'fourth_processes_title',
        'fourth_processes_content', 
        'first_lower_content',
        'first_task_title', 
        'second_task_title',
        'first_task_content', 
        'second_task_content',
        'third_task_content', 
        'second_lower_content',
        'first_icon_title',
        'first_icon_excerpt',
        'second_icon_title',
        'second_icon_excerpt',
        'third_icon_title',
        'third_icon_excerpt',
        'icon_title'     
    ];
}
