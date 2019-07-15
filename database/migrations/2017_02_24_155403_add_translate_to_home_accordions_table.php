<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTranslateToHomeAccordionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_accordions', function (Blueprint $table) {
            $table->string('title_en')->nullable();
            $table->text('description_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_accordions', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'description_en']);
        });
    }
}
