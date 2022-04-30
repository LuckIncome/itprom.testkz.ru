<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class About extends Model
{
    use HasFactory;
    use Translatable;
    protected $table = 'about';
    protected $translatable = ['title', 'excerpt', 'first_content', 'first_title_image', 'first_alt_image', 'second_title_image', 'second_alt_image', 'second_content'];
}
