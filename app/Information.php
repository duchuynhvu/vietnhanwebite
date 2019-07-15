<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Information extends Model
{
    protected $table = 'information';

    protected $fillable = [
        'hotline', 'email', 'facebook', 'twitter', 'youtube', 'address', 'phone', 'address_en'
    ];

    public function getCoordinates($address)
    {
        $address = str_replace(",", "", $address);
        $address = str_replace(" ", "+", $address);
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&key=";
        $response = @file_get_contents($url);
        $json = json_decode($response, true);
        if ($json['status'] == 'OK') {
            return [
                'lat' => $json['results'][0]['geometry']['location']['lat'],
                'lng' => $json['results'][0]['geometry']['location']['lng']
            ];
        } else {
            return [
                'lat' => 37.4224764,
                'lng' => -122.0842499
            ];
        }
    }

    public function showAddress()
    {
        $lang = App::getLocale();
        if ($lang == 'en' && $this->address_en != "") {
            return $this->address_en;
        } else {
            return $this->address;
        }
    }

}