<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Analytic extends Model
{
    use HasFactory;
    use Translatable;
    protected $table = 'analytic';
    protected $translatable = ['title', 'excerpt', 'first_content', 'second_content', 'third_content'];
}
