<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = [
        'name', 'image', 'content', 'name_en', 'content_en'
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

    public function showContent()
    {
        if ($this->getLocale() == 'en' && $this->content_en != "") {
            return $this->content_en;
        } else {
            return $this->content;
        }
    }
}
