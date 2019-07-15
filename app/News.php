<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title', 'image', 'description', 'content', 'author_id', 'category_id', 'slug', 'publish', 'title_en', 'description_en', 'content_en'
    ];

    public function getLocale()
    {
        $locale = App::getLocale();
        return $locale;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function category()
    {
        return $this->belongsTo('App\NewsCategory', 'category_id');
    }

    public function showTitle()
    {
        if ($this->getLocale() == 'en' && $this->title_en != "") {
            return $this->title_en;
        } else {
            return $this->title;
        }
    }

    public function showDescription()
    {
        if ($this->getLocale() == 'en' && $this->description_en != "") {
            return $this->description_en;
        } else {
            return $this->description;
        }
    }

    public function showContent()
    {
        if ($this->getLocale() == 'en' && $this->content_en != "") {
            return $this->content_en;
        } else {
            return $this->content;
        }
    }

    public function seo()
    {
        return $this->hasOne('App\NewsSEO', 'news_id');
    }
}
