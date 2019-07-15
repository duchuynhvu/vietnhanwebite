<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Information;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hotline')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
        Information::create([
            'hotline' => '0918 191 854',
            'email' => 'trannhan057@gmail.com',
            'address' => '53A, Đường 205A, Phường Tân Phú, Quận 9, TP.HCM, Việt Nam'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information');
    }
}
