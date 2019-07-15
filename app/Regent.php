<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Regent extends Model
{
    protected $table = 'regents';

    protected $fillable = [
        'name', 'regency', 'image', 'content', 'name_en', 'regency_en', 'content_en'
    ];

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

    public function showRegency()
    {
        if ($this->getLocale() == 'en' && $this->regency_en != "") {
            return $this->regency_en;
        } else {
            return $this->regency;
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
}
