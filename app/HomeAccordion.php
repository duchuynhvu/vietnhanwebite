<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class HomeAccordion extends Model
{
    protected $table = 'home_accordions';

    protected $fillable = [
        'title', 'description', 'publish', 'title_en', 'description_en'
    ];

    public function getLocale()
    {
        $locale = App::getLocale();
        return $locale;
    }

    public function showTitle()
    {
        if ($this->getLocale() == 'en' && $this->title_en != "" ) {
            return $this->title_en;
        } else {
            return $this->title;
        }
    }

    public function showDescription()
    {
        if ($this->getLocale() == 'en' && $this->description_en != "" ) {
            return $this->description_en;
        } else {
            return $this->description;
        }
    }

}
