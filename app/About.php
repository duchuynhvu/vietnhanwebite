<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class About extends Model
{
    protected $table = 'about';

    protected $fillable = [
        'content', 'content_en'
    ];

    public function showContent()
    {
        $lang = App::getLocale();
        if ($lang == 'en' && $this->content_en != "") {
            return $this->content_en;
        } else {
            return $this->content;
        }
    }
}
