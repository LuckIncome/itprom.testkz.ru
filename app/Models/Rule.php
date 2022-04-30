<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Rule extends Model
{
    use HasFactory;
    use Translatable;
    protected $table = 'rule';
    protected $translatable = ['title', 'content'];
}
