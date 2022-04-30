<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use Nicolaslopezj\Searchable\SearchableTrait;

use App\Models\Market;

class News extends Model
{
    use HasFactory;
    use Translatable;
    use SearchableTrait;
    protected $table = 'news';
    protected $fillable = array();
    protected $translatable = ['title', 'content', 'seo_title', 'meta_description', 'meta_keywords'];
    protected $searchable = [
    'columns' => [
            'title' => 10,
            'content' => 10,
        ],
    ];
    
    public function news_market()
    {
      return $this->belongsTo(Market::class)->with(['translations']);
    }
}
