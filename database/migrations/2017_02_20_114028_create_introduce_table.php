<?php

use App\Introduce;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntroduceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('introduce', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('introduce');
            $table->string('video');
            $table->string('founder');
            $table->string('image');
            $table->text('stated');
            $table->timestamps();
        });
        Introduce::create([
            'introduce' => 'Lorem ipsum dolor sit amet',
            'video' => 'oceans.mp4',
            'founder' => 'Lorem ipsum dolor sit amet',
            'image' => 'founder.jpg',
            'stated' => 'Lorem ipsum dolor sit amet'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('introduce');
    }
}
