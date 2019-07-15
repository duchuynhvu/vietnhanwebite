<?php

use App\News;
use App\NewsSEO;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsSeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_seo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('keyword')->nullable();
            $table->timestamps();
        });
        $news = News::all();
        foreach ($news as $item) {
            NewsSEO::create([
                'news_id' => $item->id,
                'title' => $item->title,
                'description' => $item->title
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
        Schema::dropIfExists('news_seo');
    }
}
