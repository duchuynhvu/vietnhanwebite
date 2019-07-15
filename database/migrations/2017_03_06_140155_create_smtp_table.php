<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\SMTP;

class CreateSmtpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smtp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('host');
            $table->integer('port');
            $table->string('encryption');
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        });
        SMTP::create([
            'host' => 'smtp.gmail.com',
            'port' => '587',
            'encryption' => 'tls',
            'username' => 'sam.test.3007@gmail.com',
            'password' => 'Atung3007?'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smtp');
    }
}
