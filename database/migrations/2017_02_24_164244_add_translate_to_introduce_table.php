<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTranslateToIntroduceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('introduce', function (Blueprint $table) {
            $table->longText('introduce_en')->nullable();
            $table->string('founder_en')->nullable();
            $table->text('stated_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('introduce', function (Blueprint $table) {
            $table->dropColumn(['introduce_en', 'founder_en', 'stated_en']);
        });
    }
}
