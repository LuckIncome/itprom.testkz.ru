<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

use App\Models\News;

class Market extends Model
{
    use HasFactory;
    use Translatable;
    protected $table = 'market';
    protected $fillable = array();
    protected $translatable = ['title', 'excerpt', 'first_content', 'second_content', 'third_content', 'seo_title', 'meta_description', 'meta_keywords'];

    public function news()
    {
      return $this->hasMany(News::class)->with(['translations']);
    }
}
