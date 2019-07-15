<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\SliderImage;

class CreateSliderImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('alt')->nullable();
            $table->boolean('publish')->default(1);
            $table->timestamps();
        });
        SliderImage::create([
            'image' => 'slide-1.jpg'
        ]);
        SliderImage::create([
            'image' => 'slide-2.jpg'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider_images');
    }
}
