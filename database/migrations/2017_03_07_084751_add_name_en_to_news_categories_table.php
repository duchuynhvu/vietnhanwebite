<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameEnToNewsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_categories', function (Blueprint $table) {
            $table->string('name_en')->nullable();
            $table->string('slug_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_categories', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'slug_en']);
        });
    }
}
