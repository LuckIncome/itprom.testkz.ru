<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Project extends Model
{
    use HasFactory;
    use Translatable;
    protected $table = 'project';
    protected $translatable = [
        'title', 
        'content', 
        'seo_title', 
        'meta_description', 
        'meta_keywords'
    ];
}
