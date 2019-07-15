<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientLink extends Model
{
    protected $table = 'client_links';

    protected $fillable = [
        'name', 'logo', 'link'
    ];
}
