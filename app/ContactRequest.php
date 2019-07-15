<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    protected $table = 'contact_requests';

    protected $fillable = [
        'status', 'name', 'phone', 'email', 'message'
    ];

    public function status($status)
    {
        $statusStr = "";
        switch ($status) {
            case 1:
                $statusStr = "New";
                break;
            case 0:
                $statusStr = "Read";
                break;
            default:
                break;
        }
        return $statusStr;
    }
}
