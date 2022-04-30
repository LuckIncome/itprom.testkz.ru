<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Work extends Model
{
    use HasFactory;
    use Translatable;
    protected $table = 'work';
    protected $translatable = ['title', 'content'];
}
