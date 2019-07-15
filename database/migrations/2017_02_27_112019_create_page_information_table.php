<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageInformationTable extends Migration
{
    private $page = ['home', 'about', 'project', 'benefit', 'pricing', 'news', 'partner', 'contact'];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page')->unique();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('keyword')->nullable();
            $table->timestamps();
        });
        foreach ($this->page as $item) {
            \App\PageInformation::create([
                'page' => $item
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
        Schema::dropIfExists('page_information');
    }
}
