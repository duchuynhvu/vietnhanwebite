<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email',250);
            $table->string('password');
            $table->boolean('role');
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@test.com',
            'password' => bcrypt('123456'),
            'role'     => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
