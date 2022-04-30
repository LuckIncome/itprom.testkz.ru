<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class ImageText extends Model
{
    use HasFactory;
    use Translatable;
    protected $table = 'image_text';
    protected $translatable = ['title', 'excerpt'];
}
