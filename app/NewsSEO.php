<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsSEO extends Model
{
    protected $table = 'news_seo';

    protected $fillable = [
        'news_id', 'title', 'description', 'keyword'
    ];
}
