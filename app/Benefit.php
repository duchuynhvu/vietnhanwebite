<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Benefit extends Model
{
    protected $table = 'benefits';

    protected $fillable = [
        'title', 'content', 'icon', 'feature', 'title_en', 'content_en', 'description', 'description_en'
    ];

    public function getLocale()
    {
        $locale = App::getLocale();
        return $locale;
    }

    public function showTitle()
    {
        if ($this->getLocale() == 'en' && $this->title_en != "") {
            return $this->title_en;
        } else {
            return $this->title;
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

    public function showDescription()
    {
        if ($this->getLocale() == 'en' && $this->description_en != "") {
            return $this->description_en;
        } else {
            return $this->description;
        }
    }
}
