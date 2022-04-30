<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Main extends Model
{
    use HasFactory;
    use Translatable;
    protected $table = 'main';
    protected $translatable = ['title', 'excerpt', 'first_title', 'first_excerpt', 'second_title', 'second_excerpt', 'third_title', 'third_excerpt'];
}
