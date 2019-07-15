<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsCategoriesTable extends Migration
{
    public $cate = [
        'Tin tức ngành an toàn',
        'Tin tức Việt Nhân'
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
        foreach ($this->cate as $item) {
            \App\NewsCategory::create([
                'name' => $item,
                'slug' => str_slug($item)
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_categories');
    }
}
