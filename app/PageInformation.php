<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SEO;
use Artesaos\SEOTools\Facades\SEOMeta;

class PageInformation extends Model
{
    protected $table = 'page_information';
    protected $fillable = [
        'page', 'title', 'description', 'keyword'
    ];

    public function showNamePage($code)
    {
        $value = "";
        $name = [
            'home' => 'Homepage',
            'about' => 'About Us',
            'project' => 'Project Info',
            'benefit' => 'Feature Benefits',
            'pricing' => 'Pricing & Packages',
            'news' => 'News',
            'partner' => 'Partner',
            'contact' => 'Contact'
        ];
        reset($name);
        foreach ($name as $key => $item) {
            if ($code == $key) {
                $value = $item;
            }
        }
        return $value;
    }

    public function seo()
    {
        SEO::setTitle($this->title);
        SEO::setDescription($this->description);
        SEOMeta::addKeyword(explode(",", $this->keyword));
    }

}
