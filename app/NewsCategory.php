<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\App;

class NewsCategory extends Model
{
    protected $table = 'news_categories';

    protected $fillable = [
        'name', 'slug', 'name_en', 'slug_en'
    ];

    public function news()
    {
        return $this->hasMany('App\News', 'category_id', 'id');
    }

    public function getLocale()
    {
        $locale = App::getLocale();
        return $locale;
    }

    public function showName()
    {
        if ($this->getLocale() == 'en' && $this->name_en != "") {
            return $this->name_en;
        } else {
            return $this->name;
        }
    }

    public function showSlug()
    {
        if ($this->getLocale() == 'en' && $this->slug_en != "") {
            return $this->slug_en;
        } else {
            return $this->slug;
        }
    }
}