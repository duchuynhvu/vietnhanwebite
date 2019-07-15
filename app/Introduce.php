<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Introduce extends Model
{
    protected $table = 'introduce';

    protected $fillable = [
        'introduce', 'video', 'founder', 'image', 'stated', 'introduce_en', 'founder_en', 'stated_en'
    ];

    public function getLocale()
    {
        $locale = App::getLocale();
        return $locale;
    }

    public function showIntroduce()
    {
        if ($this->getLocale() == 'en' && $this->introduce_en != "") {
            return $this->introduce_en;
        } else {
            return $this->introduce;
        }
    }

    public function showFounder()
    {
        if ($this->getLocale() == 'en' && $this->founder_en != "") {
            return $this->founder_en;
        } else {
            return $this->founder;
        }
    }

    public function showStated()
    {
        if ($this->lang == 'en' && $this->stated_en != "") {
            return $this->stated_en;
        } else {
            return $this->stated;
        }
    }

}
